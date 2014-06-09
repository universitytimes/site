<?php

/** ##############################################################################################################################################
 *    AlpineBot Secondary
 * 
 *    Display functions
 *    Contains ONLY UNIVERSAL functions
 * 
 *  ##########################################################################################
 */

class PhotoTileForFlickrBotSecondary extends PhotoTileForFlickrPrimary{     
   
/**
 *  Update global (non-widget) options
 *  
 *  @ Since 1.2.4
 *  @ Updated 1.2.5
 */
  function update_global_options(){
    $options = $this->get_all_options();
    $defaults = $this->option_defaults(); 
    foreach( $defaults as $name=>$info ){
      if( empty($info['widget']) && isset($options[$name])){
        // Update non-widget settings only
        $this->set_active_option($name,$options[$name]);
      }
    }
    // Go ahead and reset info also
    $this->set_private('results', array('photos'=>array(),'feed_found'=>false,'success'=>false,'userlink'=>'','hidden'=>'','message'=>'') );
  }
  
//////////////////////////////////////////////////////////////////////////////////////
///////////////////////      Feed Fetch Functions       //////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////

/**
 *  Function for creating cache key
 *  
 *  @ Since 1.2.2
 */
  function key_maker( $array ){
    if( isset($array['name']) && is_array( $array['info'] ) ){
      $return = $array['name'];
      foreach( $array['info'] as $key=>$val ){
        $return = $return."-".(!empty($val)?$val:$key);
      }
      $return = $this->filter_filename( $return );
      return $return;
    }
  }
/**
 *  Filter string and remove specified characters
 *  
 *  @ Since 1.2.2
 */  
  function filter_filename( $name ){
    $name = @ereg_replace('[[:cntrl:]]', '', $name ); // remove ASCII's control characters
    $bad = array_merge(
      array_map('chr', range(0,31)),
      array("<",">",":",'"',"/","\\","|","?","*"," ",",","\'",".")); 
    $return = str_replace($bad, "", $name); // Remove Windows filename prohibited characters
    return $return;
  }
  
//////////////////////////////////////////////////////////////////////////////////////
/////////////////////////      Cache Functions       /////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////

/**
 * Functions for retrieving results from cache
 *  
 * @ Since 1.2.4
 *
 */
  function retrieve_from_cache( $key ){
    if ( !$this->check_active_option('cache_disable') ) {
      if( $this->cacheExists($key) ) {
        $results = $this->getCache($key);
        $results = @unserialize($results);
        if( count($results) ){
          $results['hidden'] .= '<!-- Retrieved from cache -->';
          $this->set_private('results',$results);
          if( $this->check_active_result('photos') ){
            return true;
          }
        }
      }
    }
    return false;
  }
/**
 * Functions for storing results in cache
 *  
 * @ Since 1.2.4
 *
 */
  function store_in_cache( $key ){
    if( $this->check_active_result('success') && !$this->check_active_option('disable_cache') ){     
      $cache_results = $this->get_private('results');
      if(!is_serialized( $cache_results  )) { $cache_results  = @maybe_serialize( $cache_results ); }
      $this->putCache($key, $cache_results);
      $cachetime = $this->get_option( 'cache_time' );
      if( !empty($cachetime) && is_numeric($cachetime) ){
        $this->setExpiryInterval( $cachetime*60*60 );
      }
    }
  }

/**
 * Functions for caching results and clearing cache
 *  
 * @since 1.1.0
 *
 */
  function setCacheDir($val) {  $this->set_private('cacheDir',$val); }  
  function setExpiryInterval($val) {  $this->set_private('expiryInterval',$val); }  
  function getExpiryInterval($val) {  return (int)$this->get_private('expiryInterval'); }
  
  function cacheExists($key) {  
    $filename_cache = $this->get_private('cacheDir') . '/' . $key . '.cache'; //Cache filename  
    $filename_info = $this->get_private('cacheDir') . '/' . $key . '.info'; //Cache info  
  
    if (file_exists($filename_cache) && file_exists($filename_info)) {  
      $cache_time = file_get_contents ($filename_info) + (int)$this->get_private('expiryInterval'); //Last update time of the cache file  
      $time = time(); //Current Time  
      $expiry_time = (int)$time; //Expiry time for the cache  

      if ((int)$cache_time >= (int)$expiry_time) {//Compare last updated and current time  
        return true;  
      }  
    }
    return false;  
  } 

  function getCache($key)  {  
    $filename_cache = $this->get_private('cacheDir') . '/' . $key . '.cache'; //Cache filename  
    $filename_info = $this->get_private('cacheDir') . '/' . $key . '.info'; //Cache info  
  
    if (file_exists($filename_cache) && file_exists($filename_info))  {  
      $cache_time = file_get_contents ($filename_info) + (int)$this->get_private('expiryInterval'); //Last update time of the cache file  
      $time = time(); //Current Time  

      $expiry_time = (int)$time; //Expiry time for the cache  

      if ((int)$cache_time >= (int)$expiry_time){ //Compare last updated and current time 
        return file_get_contents ($filename_cache);   //Get contents from file  
      }  
    }
    return null;  
  }  

  function putCache($key, $content) {  
    $time = time(); //Current Time  
    $dir = $this->get_private('cacheDir');
    if ( !file_exists($dir) ){  
      @mkdir($dir);  
      $cleaning_info = $dir . '/cleaning.info'; //Cache info 
      @file_put_contents ($cleaning_info , $time); // save the time of last cache update  
    }
    
    if ( file_exists($dir) && is_dir($dir) ){
      $filename_cache = $dir . '/' . $key . '.cache'; //Cache filename  
      $filename_info = $dir . '/' . $key . '.info'; //Cache info  
    
      @file_put_contents($filename_cache ,  $content); // save the content  
      @file_put_contents($filename_info , $time); // save the time of last cache update  
    }
  }
  
  function clearAllCache() {
    $dir = $this->get_private('cacheDir') . '/';
    if(is_dir($dir)){
      $opendir = @opendir($dir);
      while(false !== ($file = readdir($opendir))) {
        if($file != "." && $file != "..") {
          if(file_exists($dir.$file)) {
            $file_array = @explode('.',$file);
            $file_type = @array_pop( $file_array );
            // only remove cache or info files
            if( 'cache' == $file_type || 'info' == $file_type){
              @chmod($dir.$file, 0777);
              @unlink($dir.$file);
            }
          }
          /*elseif(is_dir($dir.$file)) {
            @chmod($dir.$file, 0777);
            @chdir('.');
            @destroy($dir.$file.'/');
            @rmdir($dir.$file);
          }*/
        }
      }
      @closedir($opendir);
    }
  }
  
  function cleanCache() {
    $cleaning_info = $this->get_private('cacheDir') . '/cleaning.info'; //Cache info     
    if (file_exists($cleaning_info))  {  
      $cache_time = file_get_contents ($cleaning_info) + (int)$this->cleaningInterval; //Last update time of the cache cleaning  
      $time = time(); //Current Time  
      $expiry_time = (int)$time; //Expiry time for the cache  
      if ((int)$cache_time < (int)$expiry_time){ //Compare last updated and current time     
        // Clean old files
        $dir = $this->get_private('cacheDir') . '/';
        if(is_dir($dir)){
          $opendir = @opendir($dir);
          while(false !== ($file = readdir($opendir))) {                            
            if($file != "." && $file != "..") {
              if(is_dir($dir.$file)) {
                //@chmod($dir.$file, 0777);
                //@chdir('.');
                //@destroy($dir.$file.'/');
                //@rmdir($dir.$file);
              }
              elseif(file_exists($dir.$file)) {
                $file_array = @explode('.',$file);
                $file_type = @array_pop( $file_array );
                $file_key = @implode( $file_array );
                if( $file_type && $file_key && 'info' == $file_type){
                  $filename_cache = $dir . $file_key . '.cache'; //Cache filename  
                  $filename_info = $dir . $file_key . '.info'; //Cache info   
                  if (file_exists($filename_cache) && file_exists($filename_info)) {  
                    $cache_time = file_get_contents ($filename_info) + (int)$this->cleaningInterval; //Last update time of the cache file  
                    $expiry_time = (int)$time; //Expiry time for the cache  
                    if ((int)$cache_time < (int)$expiry_time) {//Compare last updated and current time  
                      @chmod($filename_cache, 0777);
                      @unlink($filename_cache);
                      @chmod($filename_info, 0777);
                      @unlink($filename_info);
                    }  
                  }
                  /*elseif (file_exists($filename_cache) && file_exists($filename_info)) {  
                    $cache_time = file_get_contents ($filename_info) + (int)$this->cleaningInterval; //Last update time of the cache file  
                    $expiry_time = (int)$time; //Expiry time for the cache  
                    if ((int)$cache_time < (int)$expiry_time) {//Compare last updated and current time  
                      @chmod($filename_cache, 0777);
                      @unlink($filename_cache);
                      @chmod($filename_info, 0777);
                      @unlink($filename_info);
                    } 
                  }*/
                }
              }
            }
          }
          @closedir($opendir);
        }
        @file_put_contents ($cleaning_info , $time); // save the time of last cache cleaning        
      }
    }
  } 
  
  /*
  function putCacheImage($image_url){
    $time = time(); //Current Time  
    if ( ! file_exists($this->cacheDir) ){  
      @mkdir($this->cacheDir);  
      $cleaning_info = $this->cacheDir . '/cleaning.info'; //Cache info 
      @file_put_contents ($cleaning_info , $time); // save the time of last cache update  
    }
    
    if ( file_exists($this->cacheDir) && is_dir($this->cacheDir) ){ 
      //replace with your cache directory
      $dir = $this->cacheDir.'/';
      //get the name of the file
      $exploded_image_url = explode("/",$image_url);
      $image_filename = end($exploded_image_url);
      $exploded_image_filename = explode(".",$image_filename);
      $name = current($exploded_image_filename);
      $extension = end($exploded_image_filename);
      //make sure its an image
      if($extension=="gif"||$extension=="jpg"||$extension=="png"){
        //get the remote image
        $image_to_fetch = @file_get_contents($image_url);
        //save it
        $filename_image = $dir . $image_filename;
        $filename_info = $dir . $name . '.info'; //Cache info  
      
        $local_image_file = @fopen($filename_image, 'w+');
        @chmod($dir.$image_filename,0755);
        @fwrite($local_image_file, $image_to_fetch);
        @fclose($local_image_file);
        
        @file_put_contents($filename_info , $time); // save the time of last cache update  
      }
    }
  }
  
  function getImageCache($image_url)  {  
    $dir = $this->cacheDir.'/';
  
    $exploded_image_url = explode("/",$image_url);
    $image_filename = end($exploded_image_url);
    $exploded_image_filename = explode(".",$image_filename);
    $name = current($exploded_image_filename);  
    $filename_image = $dir . $image_filename;
    $filename_info = $dir . $name . '.info'; //Cache info  
  
    if (file_exists($filename_image) && file_exists($filename_info))  {  
      $cache_time = @file_get_contents ($filename_info) + (int)$this->expiryInterval; //Last update time of the cache file  
      $time = time(); //Current Time  

      $expiry_time = (int)$time; //Expiry time for the cache  

      if ((int)$cache_time >= (int)$expiry_time){ //Compare last updated and current time 
        return $this->cacheUrl.'/'.$image_filename;   // Return image URL
      }else{
        $local_image_file = @fopen($filename_image, 'w+');
        @chmod($dir.$image_filename,0755);
        @fwrite($local_image_file, $image_to_fetch);
        @fclose($local_image_file);
        
        @file_put_contents($filename_info , $time); // save the time of last cache update  
      }
    }elseif( $this->cacheAttempts < $this->cacheLimit ){
      $this->putCacheImage($image_url);
      $this->cacheAttempts++;
    }
    return null;  
  }  
  */
}

/** ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *   
 *    AlpineBot Tertiary
 * 
 *    Display functions
 *    Contains ONLY UNIQUE functions
 * 
 *  ##########################################################################################
 */
 
class PhotoTileForFlickrBotTertiary extends PhotoTileForFlickrBotSecondary{ 
 
  // For Reference:
  // http://www.flickr.com/services/api/response.json.html
  // sq = thumbnail 75x75
  // t = 100 on longest side
  // s = 240 on longest side
  // n = 320 on longest side
  // m = 500 on longest side
  // z = 640 on longest side
  // c = 800 on longest side
  // b = 1024 on longest side*
  // o = original image, either a jpg, gif or png, depending on source format**
  // *Before May 25th 2010 large photos only exist for very large original images.
  // **Original photos behave a little differently. They have their own secret (called originalsecret in responses) and a variable file extension (called originalformat in responses). These values are returned via the API only when the caller has permission to view the original size (based on a user preference and various other criteria). The values are returned by the flickr.photos.getInfo method and by any method that returns a list of photos and allows an extras parameter (with a value of original_format), such as flickr.photos.search. The flickr.photos.getSizes method, as always, will return the full original URL where permissions allow.

//////////////////////////////////////////////////////////////////////////////////////
//////////////////        Unique Feed Fetch Functions        /////////////////////////
//////////////////////////////////////////////////////////////////////////////////////    

/**
 * Alpine PhotoTile for Flickr: Photo Retrieval Function.
 * The PHP for retrieving content from Flickr.
 *
 * @ Since 1.0.0
 * @ Updated 1.2.5
 */  
  function photo_retrieval(){
    $flickr_options = $this->get_private('options');
    $defaults = $this->option_defaults();

    $key_input = array(
      'name' => 'flickr',
      'info' => array(
        'vers' => $this->get_private('vers'),
        'src' => (isset($flickr_options['flickr_source'])?$flickr_options['flickr_source']:''),
        'uid' => (isset($flickr_options['flickr_user_id'])?$flickr_options['flickr_user_id']:''),
        'groupid' => (isset($flickr_options['flickr_group_id'])?$flickr_options['flickr_group_id']:''),
        'set' => (isset($flickr_options['flickr_set_id'])?$flickr_options['flickr_set_id']:''),
        'tags' => (isset($flickr_options['flickr_tags'])?$flickr_options['flickr_tags']:''),
        'num' => (isset($flickr_options['flickr_photo_number'])?$flickr_options['flickr_photo_number']:''),
        'off' => (isset($flickr_options['photo_feed_offset'])?$flickr_options['photo_feed_offset']:''),
        'link' => (isset($flickr_options['flickr_display_link'])?$flickr_options['flickr_display_link']:''),
        'text' => (isset($flickr_options['flickr_display_link_text'])?$flickr_options['flickr_display_link_text']:''),
        'size' => (isset($flickr_options['flickr_photo_size'])?$flickr_options['flickr_photo_size']:'')
        )
      );
    $key = $this->key_maker( $key_input );  // Make Key
    if( $this->retrieve_from_cache( $key ) ){  return; } // Check Cache
    $this->set_size_id(); // Set image size (translate size to Flickr id)
    
    //$this->set_active_option('api_key','68b8278a33237f1f369cbbf3c9a9f45c');
    if( $this->check_active_option('api_key') ){
      $this->append_active_result('hidden','<!-- Using AlpinePT for Flickr v'.$this->get_private('ver').' with Flickr API V2 -->');
    }else{
      $this->append_active_result('hidden','<!-- Using AlpinePT for Flickr v'.$this->get_private('ver').' with Flickr API V1 -->');
    }

    if( function_exists('unserialize') ) {
      $this->try_php_serial();
    }
    
    if ( !$this->check_active_result('success') && function_exists('simplexml_load_file') ) {
      if( $this->check_active_option('api_key') ){
        $this->try_rest();
      }else{
        // Use my API key
        $this->append_active_result('hidden','<!-- Using stored API key -->');
        $this->set_active_option('api_key','68b8278a33237f1f369cbbf3c9a9f45c');
        $this->try_rest();
      }
    }

    if( $this->check_active_result('success') ){
      $src = $this->get_private('src');
      if( $this->check_active_result('userlink') && $this->check_active_option($src.'_display_link') && $this->check_active_option($src.'_display_link_text') && 'community' != $this->get_active_option($src.'_source') ){
        $linkurl = $this->get_active_result('userlink');
        $link = '<div class="AlpinePhotoTiles-display-link" >';
        $link .='<a href="'.$linkurl.'" target="_blank" >';
        $link .= $this->get_active_option($src.'_display_link_text');
        $link .= '</a></div>';
        $this->set_active_result('userlink',$link);
      }else{
        $this->set_active_result('userlink',null);
      }
    }else{
      if( $this->check_active_result('feed_found') ){
        $this->append_active_result('message','- Flickr feed was successfully retrieved, but no photos found.');
      }else{
        $this->append_active_result('message','- Please recheck your ID(s).');
      }
    }
    
    //$this->results = array('continue'=>$this->success,'message'=>$this->message,'hidden'=>$this->hidden,'photos'=>$this->photos,'user_link'=>$this->userlink);

    $this->store_in_cache( $key );  // Store in cache

  }
/**
 *  Function for forming Flickr request
 *  
 *  @ Since 1.2.4
 */ 
  function get_flickr_request($format){
    $options = $this->get_private('options');
    $offset = ((!empty($options['photo_feed_offset'])&&is_numeric($options['photo_feed_offset']))?$options['photo_feed_offset']:0);
    $num = $offset + $options['flickr_photo_number'];
    if( !empty($options['photo_feed_shuffle']) && function_exists('shuffle') ){ // Shuffle the results
      $num = min( 200, $num*6 );
    }
    $flickr_uid = empty($options['flickr_user_id']) ? 'uid' : $options['flickr_user_id'];
    $request = false;

    if( !empty( $options['api_key'] ) ){
      $key = $options['api_key'];
      switch ($options['flickr_source']) {
        case 'user':
          $request = 'http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key='.$key.'&per_page='.$num.'&format='.$format.'&privacy_filter=1&user_id='. $flickr_uid .'&page=1&extras=description,url_sq,url_t,url_s,url_m,url_n,url_z,url_c';
        break;
        case 'favorites':
          $request = 'http://api.flickr.com/services/rest/?method=flickr.favorites.getPublicList&api_key='.$key.'&per_page='.$num.'&format='.$format.'&privacy_filter=1&user_id='. $flickr_uid .'&page=1&extras=description,url_sq,url_t,url_s,url_m,url_n,url_z,url_c';
        break;
        case 'group':
          $flickr_groupid = ( empty($options['flickr_group_id']) ? '' : $options['flickr_group_id']);
          $request = 'http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key='.$key.'&per_page='.$num.'&format='.$format.'&privacy_filter=1&group_id='. $flickr_groupid .'&page=1&extras=description,url_sq,url_t,url_s,url_m,url_n,url_z,url_c';
        break;
        case 'set':
          $flickr_set = (empty($options['flickr_set_id']) ? '' : $options['flickr_set_id']);
          $request = 'http://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key='.$key.'&per_page='.$num.'&format='.$format.'&privacy_filter=1&photoset_id='. $flickr_set .'&page=1&extras=description,url_sq,url_t,url_s,url_m,url_n,url_z,url_c,url_o'; // API claims no n, z, or c. Add o to cover missing sizes
        break;
        case 'community':
          $flickr_tags = (empty($options['flickr_tags']) ? '' : $options['flickr_tags']);
          $request = 'http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key='.$key.'&per_page='.$num.'&format='.$format.'&privacy_filter=1&tags='. $flickr_tags .'&page=1&extras=description,url_sq,url_t,url_s,url_m,url_n,url_z,url_c';
        break;
      } 
    }else{
      switch ($options['flickr_source']) {
        case 'user':
          $request = 'http://api.flickr.com/services/feeds/photos_public.gne?id='. $flickr_uid .'&lang=en-us&format='.$format.'';
        break;
        case 'favorites':
          $request = 'http://api.flickr.com/services/feeds/photos_faves.gne?nsid='. $flickr_uid .'&lang=en-us&format='.$format.'';
        break;
        case 'group':
          $flickr_groupid = (empty($options['flickr_group_id']) ? '' : $options['flickr_group_id']);
          $request = 'http://api.flickr.com/services/feeds/groups_pool.gne?id='. $flickr_groupid .'&lang=en-us&format='.$format.'';
        break;
        case 'set':
          $flickr_set = (empty($options['flickr_set_id']) ? '' : $options['flickr_set_id']);
          $request = 'http://api.flickr.com/services/feeds/photoset.gne?set=' . $flickr_set . '&nsid='. $flickr_uid .'&lang=en-us&format='.$format.'';
        break;
        case 'community':
          $flickr_tags = (empty($options['flickr_tags']) ? '' : $options['flickr_tags']);
          $request = 'http://api.flickr.com/services/feeds/photos_public.gne?tags='. $flickr_tags .'&lang=en-us&format='.$format.'';
        break;
      } 
    }
    return $request;
 }
/**
 *  Determine image size id
 *  
 *  @ Since 1.2.4
 *  @ Updated 1.2.5
 */
  function set_size_id(){
    $this->set_active_option('size_id','url_m'); // Default is 500

    switch ($this->get_active_option('flickr_photo_size')) {
      case 75:
        $this->set_active_option('size_id','url_sq');
      break;
      case 100:
        $this->set_active_option('size_id','url_t');
      break;
      case 240:
        $this->set_active_option('size_id','url_s');
      break;
      case 320:
        $this->set_active_option('size_id','url_n');
      break;
      case 500:
        $this->set_active_option('size_id','url_m');
      break;
      case 640:
        $this->set_active_option('size_id','url_z');
      break;
      case 800:
        $this->set_active_option('size_id','url_c');
      break;
    }
  }

/**
 *  Function getting image url given size setting
 *  
 *  @ Since 1.2.2
 *  @ Updated 1.2.4
 */
  function get_image_url($info){
    $size = $this->get_active_option('size_id');
    if( $this->check_active_option('api_key') ){
      if( isset($info[$size]) ){
        return $info[$size];
      }elseif( 'url_c' == $size && (isset($info['url_o']) && ($info['height_o']<1200 && $info['width_o']<1200) ) ){ // Checking url_o is same as src==set
        return $info['url_o'];
      }elseif( 'url_c' == $size && isset($info['url_z']) ){
        return $info['url_z'];
      }elseif( isset($info['url_m']) ){
        return $info['url_m'];
      }elseif( isset($info['url_n']) ){
        return $info['url_n'];
      }
    }else{
      if( ('url_s' == $size || 'url_t' == $size) && isset($info['m_url']) ){ // Checking url_o is same as src==set
        return $info['m_url'];
      }elseif( ('url_sq' == $size) && isset($info['thumb_url']) ){ // Checking url_o is same as src==set
        return $info['thumb_url'];
      }elseif( ('url_n' == $size || 'url_m' == $size) && isset($info['l_url']) ){ // Checking url_o is same as src==set
        return $info['l_url'];
      }elseif( ('url_z' == $size || 'url_c' == $size )&& isset($info['photo_url']) ){
        return $info['photo_url'];
      }
    }
    return false;
  }
  
/**
 *  Function getting original image url given size setting
 *  
 *  @ Since 1.2.2
 *  @ Updated 1.2.4
 */
  function get_image_orig($info){
    $size = $this->get_active_option('size_id');
    if( $this->check_active_option('api_key') ){
      if( isset($info['url_c']) ){
        return $info['url_c'];
      }elseif( isset($info['url_o']) && $info['height_o']<1200 && $info['width_o']<1200 ){
        return $info['url_o'];
      }elseif( isset($info['url_z']) ){ // Checking url_o is same as src==set
        return $info['url_z'];
      }elseif( isset($info['url_m']) ){
        return $info['url_m'];
      }
    }else{
      if( isset($info['photo_url']) ){
        return $info['photo_url'];
      }elseif( isset($info['l_url']) ){ 
        return $info['l_url'];
      }elseif( isset($info['m_url']) ){ 
        return $info['m_url']; 
      }
    }
    return false;
  }
    
/**
 *  Function for making Flickr request with php_serial return format ( API v1 and v2 )
 *  
 *  @ Since 1.2.4
 */
  function try_php_serial(){
    // Retrieve content using wp_remote_get and PHP_serial
    $request = $this->get_flickr_request('php_serial');

    $_flickr_php = array();
    $response = wp_remote_get($request,
      array(
        'method' => 'GET',
        'timeout' => 20,
      )
    );
    
    if( is_wp_error( $response ) || !isset($response['body']) ) {
      $this->append_active_result('hidden','<!-- Failed using wp_remote_get() and PHP_Serial @ '.$request.' -->');
    }else{
      $_flickr_php = @unserialize($response['body']);
    }

    if( empty($_flickr_php) || (empty($_flickr_php['photos']) && empty($_flickr_php['photoset']) && empty($_flickr_php['items'])) ){
      $this->append_active_result('hidden','<!-- Failed using wp_remote_get() and PHP_Serial @ '.$request.' -->');
      if( isset($_flickr_php['message']) ){
        $this->append_active_result('message','- Attempt 1: '.$_flickr_php['message'].'<br>');
      }elseif( isset($_flickr_php['items']) ){
        $this->append_active_result('message','- Attempt 1: Flickr feed was successfully retrieved, but no photos found.<br>');
      }else{
        $this->append_active_result('message','- Attempt 1: Flickr feed not found<br>');
      }
      $this->set_active_result('success',false);
    }else{
      if( $this->check_active_option('api_key') ){
        $this->parse_php_serial_v2($_flickr_php);
      }else{
        $this->parse_php_serial_v1($_flickr_php);
      }
      if( $this->check_active_result('photos') ){
        $this->set_active_result('success',true);
        $this->append_active_result('hidden','<!-- Success using wp_remote_get() and PHP_Serial -->');
      }else{
        $this->set_active_result('success',false);
        $this->set_active_result('feed_found',true);
        $this->append_active_result('hidden','<!-- No photos found using wp_remote_get() and PHP_Serial @ '.$request.' -->');
      }
    }   
  }
/**
 *  Function for parsing results in php_serial format ( API v2 )
 *  
 *  @ Since 1.2.4
 */
  function parse_php_serial_v2($_flickr_php){
    $content =  isset($_flickr_php['photos'])?$_flickr_php['photos']:null;
    $photos = isset($_flickr_php['photos']['photo'])?$_flickr_php['photos']['photo']:null;

    // Check for photosets  
    if( 'set' == $this->get_active_option('flickr_source')) {
      $content =  isset($_flickr_php['photoset'])?$_flickr_php['photoset']:null;
      $photos = isset($_flickr_php['photoset']['photo'])?$_flickr_php['photoset']['photo']:null;
    }
    if( !empty($content) && !empty($photos) && is_array( $photos ) ){
      // Remove offset
      $offset = $this->get_active_option('photo_feed_offset');
      if( is_numeric($offset) && $offset > 0 ){
        for($j=0;$j<$offset;$j++){
          if( !empty($photos) ){
            array_shift( $photos );
          }
        }
      }
      foreach( $photos as $info ){
        $the_photo = array();
        $owner = (isset($info['owner'])?$info['owner']:$this->get_active_option('flickr_user_id'));
        $the_photo['image_link'] = 'http://www.flickr.com/photos/'.$owner.'/'.(isset($info['id'])?$info['id'].'/':'');
        $the_photo['image_title'] = (string) (isset($info['title'])? @str_replace('"','', @str_replace("'","",$info['title']) ):'');
        $the_photo['image_caption'] = (string) (isset($info['description']['_content'])?$info['description']['_content']:'');
        $the_photo['image_caption'] = str_replace("'","",$the_photo['image_caption'] );
        
        $the_photo['image_source'] = (string) $this->get_image_url($info);
        $the_photo['image_original'] = (string) $this->get_image_orig($info);
        $this->push_photo( $the_photo );
      }
    }
    $this->set_user_link($content);
  }
/**
 *  Function for parsing results in php_serial format ( API v1 )
 *  
 *  @ Since 1.2.4
 */
  function parse_php_serial_v1($_flickr_php){
    $this->set_active_result('userlink',$_flickr_php['url']); // Store userlink for later
    $content =  $_flickr_php['items'];

    if( is_array( $content ) ){
      foreach( $content as $info ){
        $the_photo = array();
        $the_photo['image_link'] = (string) (isset($info['url'])?$info['url']:'');
        $the_photo['image_title'] = (string) (isset($info['title'])? @str_replace('"','', @str_replace("'","",$info['title']) ):'' );
        $the_photo['image_caption'] = (string) (isset($info['description_raw'])?$info['description_raw']:''); // retrieve image title
        $the_photo['image_caption'] = str_replace("'","",$the_photo['image_caption'] );
        
        $the_photo['image_source'] = (string) $this->get_image_url($info);
        $the_photo['image_original'] = (string) $this->get_image_orig($info);
        $this->push_photo( $the_photo );
      }
    }
  }
  
/**
 *  Function for making flickr request with xml return format ( API v2 )
 *  
 *  @ Since 1.2.4
 */
  function try_rest(){
    $request = $this->get_flickr_request('rest');

    $_flickrurl  = @urlencode( $request );	// just for compatibility
    $_flickr_xml = @simplexml_load_file( $_flickrurl,"SimpleXMLElement",LIBXML_NOCDATA); // @ is shut-up operator

    if( empty($_flickr_xml) || (!isset($_flickr_xml->photos) && !isset($_flickr_xml->photoset)) ){
      $this->append_active_result('hidden','<!-- Failed using simplexml_load_file() and XML @ '.$request.' -->');
      if( !empty($_flickr_xml->err['msg']) ){
        $this->append_active_result('message','- Attempt 2: '.$_flickr_xml->err['msg'].'<br>');
      }
      $this->set_active_result('success',false);
    }else{
      $this->parse_rest_v2($_flickr_xml);
      if( $this->check_active_result('photos') ){
        $this->set_active_result('success',true);
        $this->append_active_result('hidden','<!-- Success using simplexml_load_file() and XML -->');
      }else{
        $this->set_active_result('success',false);
        $this->set_active_result('feed_found',true);
        $this->append_active_result('hidden','<!-- No photos found using simplexml_load_file() and XML @ '.$request.' -->');
      }
    }
  }
/**
 *  Function for parsing results in xml format ( API v2 )
 *  
 *  @ Since 1.2.4
 */  
  function parse_rest_v2($_flickr_xml){
    $_flickr_xml = $this->xml2array($_flickr_xml);

    $content =  isset($_flickr_xml['photos'])?$_flickr_xml['photos']:null;
    $photos = isset($content['photo'])?$content['photo']:null;
      
    // Check for photosets  
    if( $this->check_active_option('flickr_source') && 'set' == $this->get_active_option('flickr_source')) {
      $content =  $_flickr_xml['photoset'];
      $photos = $content['photo'];
    }
    if( is_array( $photos ) ){
      // Remove offset
      for($j=0;$j<$this->get_active_option('photo_feed_offset');$j++){
        if( !empty( $photos  ) ){
          array_shift( $photos );
        }
      }
      foreach( $photos as $info ){ // $photos not indexed with ints
        $the_photo = array();    
        
        if( isset($info['description']) && is_array( $info['description'] ) ){
          $the_photo['image_caption'] = '';
        }elseif( isset($info['description']) ){
          $the_photo['image_caption'] = (string) $info['description'];
          $the_photo['image_caption'] = str_replace("'","",$the_photo['image_caption'] );
        }
        $info = $info['@attributes'];
        
        $owner = (isset($info['owner'])?$info['owner']:$this->get_active_option('flickr_user_id'));
        $the_photo['image_link'] = 'http://www.flickr.com/photos/'.$owner.'/'.(isset($info['id'])?$info['id'].'/':'');
        $the_photo['image_title'] = (string) (isset($info['title'])? @str_replace('"','', @str_replace("'","",$info['title']) ):'');
        
        $the_photo['image_source'] = (string) $this->get_image_url($info);
        $the_photo['image_original'] = (string) $this->get_image_orig($info);
        $this->push_photo( $the_photo );
      }
    }
    $this->set_user_link($content);
  }
/**
 *  Convert SimpleXMLObject to PHP Array
 *  
 *  @ Since 1.2.4
 */  
  function xml2array ( $input, $out = array () ){
    foreach ( (array) $input as $index => $node ){
      $out[$index] = ( is_object ( $node ) ||  is_array ( $node ) ) ? $this->xml2array ( $node ) : $node;
    }
    return $out;
  }
/**
 *  Set user link
 *  
 *  @ Since 1.2.4
 */ 
  function set_user_link($content){
    if( 'community' != $this->get_active_option('flickr_source') && $this->check_active_option('flickr_display_link') && $this->check_active_option('flickr_display_link_text') ) {
      switch ($this->get_active_option('flickr_source')) {
        case 'user':
          $this->set_active_result('userlink','http://www.flickr.com/photos/'.$this->get_active_option('flickr_user_id').'/');
        break;
        case 'favorites':
          $this->set_active_result('userlink','http://www.flickr.com/photos/'.$this->get_active_option('flickr_user_id').'/favorites/');
        break;
        case 'group':
          $this->set_active_result('userlink','http://www.flickr.com/groups/'.$this->get_active_option('flickr_group_id').'/');
        break;
        case 'set':
          if( !empty($content['owner']) && !empty($content['id']) ){
            $this->set_active_result('userlink','http://www.flickr.com/photos/'.$content['owner'].'/sets/'.$content['id'].'/');
          }
        break;
      }
    }
  }
}
  
/** ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *   
 *  AlpineBot Display
 * 
 *  Display functions
 *  Try to keep only UNIVERSAL functions
 * 
 */
 
class PhotoTileForFlickrBot extends PhotoTileForFlickrBotTertiary{
/**
 *  Function for printing vertical style
 *  
 *  @ Since 0.0.1
 *  @ Updated 1.2.5
 */
  function display_vertical(){
    $this->set_private('out',''); // Clear any output;
    $this->update_count(); // Check number of images found
    $this->randomize_display(); 
    $opts = $this->get_private('options');
    $src = $this->get_private('src');
    $wid = $this->get_private('wid');
                      
    $this->add('<div id="'.$wid.'-AlpinePhotoTiles_container" class="AlpinePhotoTiles_container_class">');     
    
      // Align photos
      $css = $this->get_parent_css();
      $this->add('<div id="'.$wid.'-vertical-parent" class="AlpinePhotoTiles_parent_class" style="'.$css.'">');

        for($i = 0;$i<$opts[$src.'_photo_number'];$i++){
          $css = "margin:1px 0 5px 0;padding:0;max-width:100%;";
          $pin = $this->get_option( 'pinterest_pin_it_button' );
          $this->add_image($i,$css,$pin); // Add image
        }
        
        $this->add_credit_link();
      
      $this->add('</div>'); // Close vertical-parent

      $this->add_user_link();

    $this->add('</div>'); // Close container
    $this->add('<div class="AlpinePhotoTiles_breakline"></div>');
    
    $highlight = $this->get_option("general_highlight_color");
    $highlight = (!empty($highlight)?$highlight:'#64a2d8');

    $this->add_lightbox_call();
    
    if( !empty($opts['style_shadow']) || !empty($opts['style_border']) || !empty($opts['style_highlight'])  ){
      $this->add("
<script>
  jQuery(window).load(function() {
    if( jQuery().AlpineAdjustBordersPlugin ){
      jQuery('#".$this->get_private('wid')."-vertical-parent').AlpineAdjustBordersPlugin({
        highlight:'".$highlight."'
      });
    }else{
      var css = '".($this->get_private('url').'/css/'.$this->get_private('wcss').'.css')."';
      var link = jQuery(document.createElement('link')).attr({'rel':'stylesheet','href':css,'type':'text/css','media':'screen'});
      jQuery.getScript('".($this->get_private('url').'/js/'.$this->get_private('wjs').'.js')."', function(){
        if(document.createStyleSheet){
          document.createStyleSheet(css);
        }else{
          jQuery('head').append(link);
        }
        if(jQuery().AlpineAdjustBordersPlugin ){
          jQuery('#".$this->get_private('wid')."-vertical-parent').AlpineAdjustBordersPlugin({
            highlight:'".$highlight."'
          });
        } 
      });
    }
  });
</script>");  
    }
  }  
/**
 *  Function for printing cascade style
 *  
 *  @ Since 0.0.1
 *  @ Updated 1.2.5
 */
  function display_cascade(){
    $this->set_private('out',''); // Clear any output;
    $this->update_count(); // Check number of images found
    $this->randomize_display();
    $opts = $this->get_private('options');
    $wid = $this->get_private('wid');
    $src = $this->get_private('src');
    
    $this->add('<div id="'.$wid.'-AlpinePhotoTiles_container" class="AlpinePhotoTiles_container_class">');     
    
      // Align photos
      $css = $this->get_parent_css();
      $this->add('<div id="'.$wid.'-cascade-parent" class="AlpinePhotoTiles_parent_class" style="'.$css.'">');
      
        for($col = 0; $col<$opts['style_column_number'];$col++){
          $this->add('<div class="AlpinePhotoTiles_cascade_column" style="width:'.(100/$opts['style_column_number']).'%;float:left;margin:0;">');
          $this->add('<div class="AlpinePhotoTiles_cascade_column_inner" style="display:block;margin:0 3px;overflow:hidden;">');
          for($i = $col;$i<$opts[$src.'_photo_number'];$i+=$opts['style_column_number']){
            $css = "margin:1px 0 5px 0;padding:0;max-width:100%;";
            $pin = $this->get_option( 'pinterest_pin_it_button' );
            $this->add_image($i,$css,$pin); // Add image
          }
          $this->add('</div></div>');
        }
        $this->add('<div class="AlpinePhotoTiles_breakline"></div>');
          
        $this->add_credit_link();
      
      $this->add('</div>'); // Close cascade-parent

      $this->add('<div class="AlpinePhotoTiles_breakline"></div>');
      
      $this->add_user_link();

    // Close container
    $this->add('</div>');
    $this->add('<div class="AlpinePhotoTiles_breakline"></div>');
   
    $highlight = $this->get_option("general_highlight_color");
    $highlight = (!empty($highlight)?$highlight:'#64a2d8');
    
    $this->add_lightbox_call();
    
    if( !empty($opts['style_shadow']) || !empty($opts['style_border']) || !empty($opts['style_highlight'])  ){
      $this->add("
<script>
  jQuery(window).load(function() {
    if(jQuery().AlpineAdjustBordersPlugin ){
      jQuery('#".$this->get_private('wid')."-cascade-parent').AlpineAdjustBordersPlugin({
        highlight:'".$highlight."'
      });
    }else{
      var css = '".($this->get_private('url').'/css/'.$this->get_private('wcss').'.css')."';
      var link = jQuery(document.createElement('link')).attr({'rel':'stylesheet','href':css,'type':'text/css','media':'screen'});
      jQuery.getScript('".($this->get_private('url').'/js/'.$this->get_private('wjs').'.js')."', function(){
        if(document.createStyleSheet){
          document.createStyleSheet(css);
        }else{
          jQuery('head').append(link);
        }
        if(jQuery().AlpineAdjustBordersPlugin ){
          jQuery('#".$this->get_private('wid')."-cascade-parent').AlpineAdjustBordersPlugin({
            highlight:'".$highlight."'
          });
        } 
      });
    }
  });
</script>");  
    }
  }

/**
 *  Function for printing and initializing JS styles
 *  
 *  @ Since 0.0.1
 *  @ Updated 1.2.5
 */
  function display_hidden(){
    $this->set_private('out',''); // Clear any output;
    $this->update_count(); // Check number of images found
    $this->randomize_display();
    $opts = $this->get_private('options');
    $wid = $this->get_private('wid');
    $src = $this->get_private('src');
    
    $this->add('<div id="'.$wid.'-AlpinePhotoTiles_container" class="AlpinePhotoTiles_container_class">');     
      // Align photos
      $css = $this->get_parent_css();
      $this->add('<div id="'.$wid.'-hidden-parent" class="AlpinePhotoTiles_parent_class" style="'.$css.'">');
      
        $this->add('<div id="'.$wid.'-image-list" class="AlpinePhotoTiles_image_list_class" style="display:none;visibility:hidden;">'); 
        
          for($i=0;$i<$opts[$src.'_photo_number'];$i++){

            $this->add_image($i); // Add image
            
            // Load original image size
            $original = $this->get_photo_info($i,'image_original');
            if( isset($opts['style_option']) && "gallery" == $opts['style_option'] && !empty( $original ) ){
              $this->add('<img class="AlpinePhotoTiles-original-image" src="' . $original . '" />');
            }
          }
        $this->add('</div>');
        
        $this->add_credit_link();       
      
      $this->add('</div>'); // Close parent  

      $this->add_user_link();
      
    $this->add('</div>'); // Close container
    
    $disable = $this->get_option("general_loader");
    $highlight = $this->get_option("general_highlight_color");
    $highlight = (!empty($highlight)?$highlight:'#64a2d8');

    $lightbox = $this->get_option('general_lightbox');
    $prevent = $this->get_option('general_lightbox_no_load');    
    $hasLight = false;
    if( empty($prevent) && isset($opts[$this->get_private('src').'_image_link_option']) && $opts[$src.'_image_link_option'] == 'fancybox' ){
      $lightScript = $this->get_script( $lightbox );
      $lightStyle = $this->get_style( $lightbox );
      if( !empty($lightScript) && !empty($lightStyle) ){
        $hasLight = true;
      }
    }
    
    $this->add('<script>');
      if(!$disable){
        $this->add(
"jQuery(document).ready(function() {
  jQuery('#".$wid."-AlpinePhotoTiles_container').addClass('loading'); 
});");
      }
$this->add("
jQuery(window).load(function() {
  jQuery('#".$wid."-AlpinePhotoTiles_container').removeClass('loading');
  if( jQuery().AlpinePhotoTilesPlugin ){
    AlpinePhotoTilesPlugin();
  }else{
    var css = '".($this->get_private('url').'/css/'.$this->get_private('wcss').'.css')."';
    var link = jQuery(document.createElement('link')).attr({'rel':'stylesheet','href':css,'type':'text/css','media':'screen'});
    jQuery.getScript('".($this->get_private('url').'/js/'.$this->get_private('wjs').'.js')."', function(){
      if(document.createStyleSheet){
        document.createStyleSheet(css);
      }else{
        jQuery('head').append(link);
      }");
    if( $hasLight ){    
    $check = ($lightbox=='fancybox'?'fancybox':($lightbox=='prettyphoto'?'prettyPhoto':($lightbox=='colorbox'?'colorbox':'fancyboxForAlpine')));    
    $this->add("
      if( !jQuery().".$check." ){ // Load Lightbox
        jQuery.getScript('".$lightScript."', function(){
          css = '".$lightStyle."';
          link = jQuery(document.createElement('link')).attr({'rel':'stylesheet','href':css,'type':'text/css','media':'screen'});
          if(document.createStyleSheet){
            document.createStyleSheet(css);
          }else{
            jQuery('head').append(link);
          }
          AlpinePhotoTilesPlugin();
        });
      }else{
        AlpinePhotoTilesPlugin();
      }");
    }else{
    $this->add('AlpinePhotoTilesPlugin();');
    }
    $this->add("
    }); //Close getScript
  }
  function AlpinePhotoTilesPlugin() {
      jQuery('#".$wid."-hidden-parent').AlpinePhotoTilesPlugin({
        id:'".$wid."',
        style:'".(isset($opts['style_option'])?$opts['style_option']:'windows')."',
        shape:'".(isset($opts['style_shape'])?$opts['style_shape']:'square')."',
        perRow:".(isset($opts['style_photo_per_row'])?$opts['style_photo_per_row']:'3').",
        imageBorder:".(!empty($opts['style_border'])?'1':'0').",
        imageShadow:".(!empty($opts['style_shadow'])?'1':'0').",
        imageCurve:".(!empty($opts['style_curve_corners'])?'1':'0').",
        imageHighlight:".(!empty($opts['style_highlight'])?'1':'0').",
        lightbox:".((isset($opts[$src.'_image_link_option']) && $opts[$src.'_image_link_option'] == 'fancybox')?'1':'0').",
        galleryHeight:".(isset($opts['style_gallery_height'])?$opts['style_gallery_height']:'0').", // Keep for Compatibility
        galRatioWidth:".(isset($opts['style_gallery_ratio_width'])?$opts['style_gallery_ratio_width']:'800').",
        galRatioHeight:".(isset($opts['style_gallery_ratio_height'])?$opts['style_gallery_ratio_height']:'600').",
        highlight:'".$highlight."',
        pinIt:".(!empty($opts['pinterest_pin_it_button'])?'1':'0').",
        siteURL:'".get_option( 'siteurl' )."',
        callback: ".(!empty($hasLight)?'function(){'.$this->get_lightbox_call().'}':"''")."
      });
  }
}); //Close load
</script>");      
  }
/**
 *  Update photo number count
 *  
 *  @ Since 1.2.2
 */
  function update_count(){
    $src = $this->get_private('src');
    $found = ( $this->check_active_result('photos') && is_array($this->get_active_result('photos') ))?count( $this->get_active_result('photos') ):0;
    $num = $this->get_active_option( $src.'_photo_number' );
    $this->set_active_option( $src.'_photo_number', min( $num, $found ) );
  }  
/**
 *  Function for shuffleing photo feed
 *  
 *  @ Since 1.2.4
 *  @ Updated 1.2.5
 */
  function randomize_display(){
    if( $this->check_active_option('photo_feed_shuffle') ){ // Shuffle the results
      $photos = $this->get_active_result('photos');
      if( function_exists('shuffle') ){
        @shuffle( $photos );
      }elseif( function_exists('mt_rand') ){
        $i = count($photos);
        while(--$i){
          $j = @mt_rand(0,$i);
          if($i != $j){
            // swap items
            $tmp = $photos[$j];
            $photos[$j] = $photos[$i];
            $photos[$i] = $tmp;
          }
        }
      }
      $this->set_active_result('photos',$photos); 
    }  
  } 
/**
 *  Get Parent CSS
 *  
 *  @ Since 1.2.2
 *  @ Updated 1.2.5
 */
  function get_parent_css(){
    $max = $this->check_active_option('widget_max_width')?$this->get_active_option('widget_max_width'):100;
    $return = 'width:100%;max-width:'.$max.'%;padding:0px;';
    $align = $this->check_active_option('widget_alignment')?$this->get_active_option('widget_alignment'):'';
    if( 'center' == $align ){                          //  Optional: Set text alignment (left/right) or center
      $return .= 'margin:0px auto;text-align:center;';
    }
    elseif( 'right' == $align  || 'left' == $align  ){                          //  Optional: Set text alignment (left/right) or center
      $return .= 'float:' . $align  . ';text-align:' . $align  . ';';
    }
    else{
      $return .= 'margin:0px auto;text-align:center;';
    }
    return $return;
 }
 
/**
 *  Add Image Function
 *  
 *  @ Since 1.2.2
 *  @ Updated 1.2.4
 ** Possible change: place original image as 'alt' and load image as needed
 */
  function add_image($i,$css="",$pin=false){
    $light = $this->get_option( 'general_lightbox' );
    $title = $this->get_photo_info($i,'image_title');
    $src = $this->get_photo_info($i,'image_source');
    $shadow = ($this->check_active_option('style_shadow')?'AlpinePhotoTiles-img-shadow':'AlpinePhotoTiles-img-noshadow');
    $border = ($this->check_active_option('style_border')?'AlpinePhotoTiles-img-border':'AlpinePhotoTiles-img-noborder');
    $curves = ($this->check_active_option('style_curve_corners')?'AlpinePhotoTiles-img-corners':'AlpinePhotoTiles-img-nocorners');
    $highlight = ($this->check_active_option('style_highlight')?'AlpinePhotoTiles-img-highlight':'AlpinePhotoTiles-img-nohighlight');
    $onContextMenu = ($this->check_active_option('general_disable_right_click')?'onContextMenu="return false;"':'');
    
    if( $pin ){ $this->add('<div class="AlpinePhotoTiles-pinterest-container" style="position:relative;display:block;" >'); }
    
    //$src = $this->getImageCache( $this->photos[$i]['image_source'] );
    //$src = ( $src?$src:$this->photos[$i]['image_source']);
    
    $has_link = $this->get_link($i); // Add link
    $this->add('<img id="'.$this->get_private('wid').'-tile-'.$i.'" class="AlpinePhotoTiles-image '.$shadow.' '.$border.' '.$curves.' '.$highlight.'" src="' . $src . '" ');
    $this->add('title='."'". $title ."'".' alt='."'". $title ."' "); // Careful about caps with ""
    $this->add('border="0" hspace="0" vspace="0" style="'.$css.'" '.$onContextMenu.' />'); // Override the max-width set by theme
    if( $has_link ){ $this->add('</a>'); } // Close link
    
    if( $pin ){ 
      $original = $this->get_photo_info($i,'image_original');
      $this->add('<a href="http://pinterest.com/pin/create/button/?media='.$original.'&url='.get_option( 'siteurl' ).'" class="AlpinePhotoTiles-pin-it-button" count-layout="horizontal" target="_blank">');
      $this->add('<div class="AlpinePhotoTiles-pin-it"></div></a>');
      $this->add('</div>'); 
    }
  }
/**
 *  Get Image Link
 *  
 *  @ Since 1.2.2
 */
  function get_link($i){
    $src = $this->get_private('src');
    $link = $this->get_active_option($src.'_image_link_option');
    $url = $this->get_active_option('custom_link_url');

    $phototitle = $this->get_photo_info($i,'image_title');
    $photourl = $this->get_photo_info($i,'image_source');
    $linkurl = $this->get_photo_info($i,'image_link');
    $originalurl = $this->get_photo_info($i,'image_original');

    if( 'original' == $link && !empty($photourl) ){
      $this->add('<a href="' . $photourl . '" class="AlpinePhotoTiles-link" target="_blank" title='."'". $phototitle ."'".' alt='."'". $phototitle ."'".'>');
      return true;
    }elseif( ($src == $link || '1' == $link) && !empty($linkurl) ){
      $this->add('<a href="' . $linkurl . '" class="AlpinePhotoTiles-link" target="_blank" title='."'". $phototitle ."'".' alt='."'". $phototitle ."'".'>');
      return true;
    }elseif( 'link' == $link && !empty($url) ){
      $this->add('<a href="' . $url . '" class="AlpinePhotoTiles-link" target="_blank" title='."'". $phototitle ."'".' alt='."'". $phototitle ."'".'>'); 
      return true;
    }elseif( 'fancybox' == $link && !empty($originalurl) ){
      $light = $this->get_option( 'general_lightbox' );
      $this->add('<a href="' . $originalurl . '" class="AlpinePhotoTiles-link AlpinePhotoTiles-lightbox" title='."'". $phototitle ."'".' alt='."'". $phototitle ."'".'>'); 
      return true;
    }  
    return false;    
  }
/**
 *  Credit Link Function
 *  
 *  @ Since 1.2.2
 */
  function add_credit_link(){
    if( !$this->get_active_option('widget_disable_credit_link') ){
      $this->add('<div id="'.$this->get_private('wid').'-by-link" class="AlpinePhotoTiles-by-link"><a href="http://thealpinepress.com/" style="COLOR:#C0C0C0;text-decoration:none;" title="Widget by The Alpine Press">TAP</a></div>');
    }  
  }
  
/**
 *  User Link Function
 *  
 *  @ Since 1.2.2
 */
  function add_user_link(){
    if( $this->check_active_result('userlink') ){
      $userlink = $this->get_active_result('userlink');
      if($this->get_active_option('widget_alignment') == 'center'){                          //  Optional: Set text alignment (left/right) or center
        $this->add('<div id="'.$this->get_private('wid').'-display-link" class="AlpinePhotoTiles-display-link-container" ');
        $this->add('style="width:100%;margin:0px auto;">'.$userlink.'</div>');
      }
      else{
        $this->add('<div id="'.$this->get_private('wid').'-display-link" class="AlpinePhotoTiles-display-link-container" ');
        $this->add('style="float:'.$this->get_active_option('widget_alignment').';max-width:'.$this->get_active_option('widget_max_width').'%;"><center>'.$userlink.'</center></div>'); 
        $this->add('<div class="AlpinePhotoTiles_breakline"></div>'); // Only breakline if floating
      }
    }
  }
  
/**
 *  Setup Lightbox Call
 *  
 *  @ Since 1.2.3
 *  @ Updated 1.2.5
 */
  function add_lightbox_call(){
    $src = $this->get_private('src');
    $lightbox = $this->get_option('general_lightbox');
    $prevent = $this->get_option('general_lightbox_no_load');
    $check = ($lightbox=='fancybox'?'fancybox':($lightbox=='prettyphoto'?'prettyPhoto':($lightbox=='colorbox'?'colorbox':'fancyboxForAlpine')));
    if( empty($prevent) && $this->check_active_option($src.'_image_link_option') && $this->get_active_option($src.'_image_link_option') == 'fancybox' ){
      $lightScript = $this->get_script( $lightbox );
      $lightStyle = $this->get_style( $lightbox );
      if( !empty($lightScript) && !empty($lightStyle) ){
        $this->add("
<script>
  jQuery(window).load(function() {
    if( !jQuery().".$check." ){
      var css = '".$lightStyle."';
      var link = jQuery(document.createElement('link')).attr({'rel':'stylesheet','href':css,'type':'text/css','media':'screen'});
      jQuery.getScript('".($lightScript)."', function(){
        if(document.createStyleSheet){
          document.createStyleSheet(css);
        }else{
          jQuery('head').append(link);
        }
        ".$this->get_lightbox_call()."
      });
    }else{
      ".$this->get_lightbox_call()."
    }
  });
</script>");
      }
    } 
  }
  
/**
 *  Get Lightbox Call
 *  
 *  @ Since 1.2.3
 *  @ Updated 1.2.5
 */
  function get_lightbox_call(){
    $this->set_lightbox_rel();
  
    $lightbox = $this->get_option('general_lightbox');
    $lightbox_style = $this->get_option('general_lightbox_params');
    $lightbox_style = str_replace( array("{","}"), "", $lightbox_style);
    
    $setRel = "jQuery( '#".$this->get_private('wid')."-AlpinePhotoTiles_container a.AlpinePhotoTiles-lightbox' ).attr( 'rel', '".$this->get_active_option('rel')."' );";
    
    if( 'fancybox' == $lightbox ){
      $default = "titleShow: false, overlayOpacity: .8, overlayColor: '#000', titleShow: true, titlePosition: 'inside'";
      $lightbox_style = (!empty($lightbox_style)? $default.','.$lightbox_style : $default );
      return $setRel."if(jQuery().fancybox){jQuery( 'a[rel^=\'".$this->get_active_option('rel')."\']' ).fancybox( { ".$lightbox_style." } );}";  
    }elseif( 'prettyphoto' == $lightbox ){
      //theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook
      $default = "theme:'facebook',social_tools:false, show_title:true";
      $lightbox_style = (!empty($lightbox_style)? $default.','.$lightbox_style : $default );
      return $setRel."if(jQuery().prettyPhoto){jQuery( 'a[rel^=\'".$this->get_active_option('rel')."\']' ).prettyPhoto({ ".$lightbox_style." });}";  
    }elseif( 'colorbox' == $lightbox ){
      $default = "maxHeight:'85%'";
      $lightbox_style = (!empty($lightbox_style)? $default.','.$lightbox_style : $default );
      return $setRel."if(jQuery().colorbox){jQuery( 'a[rel^=\'".$this->get_active_option('rel')."\']' ).colorbox( {".$lightbox_style."} );}";  
    }elseif( 'alpine-fancybox' == $lightbox ){
      $default = "titleShow: false, overlayOpacity: .8, overlayColor: '#000', titleShow: true, titlePosition: 'inside'";
      $lightbox_style = (!empty($lightbox_style)? $default.','.$lightbox_style : $default );
      return $setRel."if(jQuery().fancyboxForAlpine){jQuery( 'a[rel^=\'".$this->get_active_option('rel')."\']' ).fancyboxForAlpine( { ".$lightbox_style." } );}";  
    }
    return "";
  }
  
 /**
  *  Set Lightbox "rel"
  *  
  *  @ Since 1.2.3
  */
  function set_lightbox_rel(){
    $lightbox = $this->get_option('general_lightbox');
    $custom = $this->get_option('hidden_lightbox_custom_rel');
    if( !empty($custom) && $this->check_active_option('custom_lightbox_rel') ){
      $rel = $this->get_active_option('custom_lightbox_rel');
      $rel = str_replace('{rtsq}',']',$rel); // Decode right and left square brackets
      $rel = str_replace('{ltsq}','[',$rel);
    }elseif( 'fancybox' == $lightbox ){
      $rel = 'alpine-fancybox-'.$this->get_private('wid');
    }elseif( 'prettyphoto' == $lightbox ){
      $rel = 'alpine-prettyphoto['.$this->get_private('wid').']';
    }elseif( 'colorbox' == $lightbox ){
      $rel = 'alpine-colorbox['.$this->get_private('wid').']';
    }else{
      $rel = 'alpine-fancybox-safemode-'.$this->get_private('wid');
    }
    $this->set_active_option('rel',$rel);
  }


}





?>
