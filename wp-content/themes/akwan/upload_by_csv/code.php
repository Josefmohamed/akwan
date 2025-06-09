<?php
function import_tutors_from_csv($csv_file_path) {
  if (!file_exists($csv_file_path)) {
    error_log("❌ File not found: $csv_file_path");
    return;
  }
  
  require_once(ABSPATH . 'wp-admin/includes/image.php');
  require_once(ABSPATH . 'wp-admin/includes/file.php');
  require_once(ABSPATH . 'wp-admin/includes/media.php');
  
  $file = fopen($csv_file_path, 'r');
  if (!$file) {
    error_log("❌ Failed to open the CSV file.");
    return;
  }
  
  $headers = fgetcsv($file); // read the first row as headers
  if (!$headers) {
    error_log("❌ Failed to read headers from CSV.");
    return;
  }
  
  while (($row = fgetcsv($file)) !== FALSE) {
    $data = array_combine($headers, $row);
    if (!$data || empty($data['post_title'])) {
      error_log("⚠️ Skipping empty or invalid row: " . print_r($row, true));
      continue;
    }
    
    error_log("ℹ️ Importing Tutor: " . print_r($data, true));
    
    $post_id = wp_insert_post([
        'post_title'  => $data['post_title'],
        'post_type'   => 'tutor',
        'post_status' => 'publish',
    ]);
    
    if (is_wp_error($post_id)) {
      error_log("❌ Error inserting post for " . $data['post_title'] . ": " . $post_id->get_error_message());
      continue;
    }
    
    error_log("✅ Post created: ID = $post_id");
    
    // Set ACF fields
    if (!empty($data['image'])) {
      // حاول تحميل الصورة من URL إلى مكتبة الوسائط
      $image_url = $data['image'];
      $image_id = media_sideload_image($image_url, $post_id, null, 'id');
    
      if (!is_wp_error($image_id)) {
        update_field('image', $image_id, $post_id);
        error_log("✅ Image imported for: " . $data['post_title']);
      } else {
        error_log("❌ Failed to import image for: " . $data['post_title'] . " - " . $image_id->get_error_message());
      }
    }
    update_field('role', $data['role'], $post_id);
    update_field('education', $data['education'], $post_id);
    update_field('subjects', $data['subjects'], $post_id);
    update_field('philosophy_quote', $data['philosophy_quote'], $post_id);
    update_field('passions', $data['passions'], $post_id);
    
    error_log("✅ ACF fields updated for: " . $data['post_title']);
  }
  
  fclose($file);
  error_log("✅ All tutors imported successfully.");
}

add_action('admin_init', function () {
  if (isset($_GET['import_tutors']) && current_user_can('manage_options')) {
    $csv_path = WP_CONTENT_DIR . '/uploads/2025/05/tutors_data.csv'; // غيّر المسار لو الملف في مكان تاني
    import_tutors_from_csv($csv_path);
    echo 'Tutors import process completed. Check debug.log for details.';
    exit;
  }
});



function import_reviews_from_csv($csv_file_path) {
  if (!file_exists($csv_file_path)) {
    error_log("❌ File not found: $csv_file_path");
    return;
  }
  
  require_once(ABSPATH . 'wp-admin/includes/taxonomy.php');
  
  $file = fopen($csv_file_path, 'r');
  $headers = fgetcsv($file); // First row is the header
  
  while (($row = fgetcsv($file)) !== FALSE) {
    $data = array_combine($headers, $row);
    
    if (!$data || empty($data['post_title'])) continue;
    
    // Insert review post
    $post_id = wp_insert_post([
        'post_title'   => $data['post_title'],
        'post_type'    => 'review',
        'post_status'  => 'publish',
    ]);
    
    if (is_wp_error($post_id)) {
      error_log("❌ Error inserting review: " . $post_id->get_error_message());
      continue;
    }
    
    // Set ACF comment field
    update_field('comment', $data['comment'], $post_id);
    
    // Assign taxonomy term
    if (!empty($data['role'])) {
      wp_set_object_terms($post_id, $data['role'], 'review_role');
    }
    
    error_log("✅ Review added: " . $data['post_title']);
  }
  
  fclose($file);
  error_log("✅ All reviews imported.");
}


add_action('admin_init', function () {
  if (isset($_GET['import_reviews']) && current_user_can('manage_options')) {
    $csv_path = WP_CONTENT_DIR . '/uploads/2025/05/reviews_data.csv'; // تأكد إن الملف مرفوع هنا
    import_reviews_from_csv($csv_path);
    echo '✅ Reviews import done. Check debug.log for details.';
    exit;
  }
});