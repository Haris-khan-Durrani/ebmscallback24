<?php 
/**
 * Plugin Name:  EBMS for CallBack24
 * Plugin URI: https://www.ebmsbusiness.com
 * Description: Callback24 Widget Popup Widget Maker With code Functionality
 * Version: 1.0
 * Author: Haris khan Durrani
 * Author URI: hariskhandurrani.com
 */
// function enqueue_scripts_only_if_page_using_shortcode()
// {
//     global $post;
//     $suffix =  mt_rand(1000, 9999);
//     if (has_shortcode($post->post_content, 'Quote_Calculator') && (is_single() || is_page())) {
//         wp_enqueue_style('intlTelInput-css', 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.5/build/css/intlTelInput.min.css');
//         wp_enqueue_script('calculator-init', plugin_dir_url(_FILE_) . 'js/calculator-init.js?v123='.$suffix);

        
//         wp_enqueue_script('calculator-step-js', plugin_dir_url(_FILE_) . 'js/calculator-step.js?v123='.$suffix, '', '', true);
//         wp_enqueue_style('calculator-step-css', plugin_dir_url(_FILE_) . 'css/calculator-step.css');
//         wp_enqueue_style('bs5-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css');
//         wp_enqueue_style('calculator-style-css', plugin_dir_url(_FILE_) . 'css/calculator-style.css');
//         wp_enqueue_script('iti-load-utils', 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js?v123='.$suffix, '', '', true);
//         wp_enqueue_script('intlTelInput-js', 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.5/build/js/intlTelInput.min.js?v123='.$suffix, '', '', true);
//         wp_enqueue_script('calculator-app', plugin_dir_url(_FILE_) . 'js/calculator-app.js?v123='.$suffix, '', '', true);
//         wp_enqueue_script('bs5-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js?v123='.$suffix, '', '', true);
//         wp_enqueue_script('jquery');
//     }
// }

// Add the plugin settings page to the WordPress admin menu
add_action('admin_menu', 'my_plugin_settings_page');
  $suffix =  mt_rand(1000, 9999);
function my_plugin_settings_page() {
    add_menu_page(
        'My Plugin Settings',
        'Call Back24',
        'manage_options',
        'my-plugin-settings',
        'my_plugin_settings_page_callback'
    );
}
// Define the plugin directory path
define( 'MY_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
// Callback function to display the plugin settings page
function my_plugin_settings_page_callback() {
    ?>
    <div class="wrap">
        <div><img src="https://storage.googleapis.com/msgsndr/CaUsaDHBNHw2z2ThM8DV/media/6454edbcd5b89306f9a543c4.png" style="width:150px">
        </div>
        <h1>Call Back 24 Plugin Setting for Widget</h1>
		   Shortcode
        <input type="text" value="[my_shortcode]"/>
        <form method="post" action="options.php">
            <?php
            settings_fields('my_plugin_settings');
            do_settings_sections('my_plugin_settings');
            submit_button('Save Settings');
            ?>
        </form>
    </div>
    <?php
}

// Register the plugin settings
add_action('admin_init', 'my_plugin_register_settings');

function my_plugin_register_settings() {
    register_setting(
        'my_plugin_settings',
        'my_plugin_options',
        'my_plugin_sanitize_options'
    );

    add_settings_section(
        'my_plugin_section',
        'Set You Settings Here',
        'my_plugin_section_callback',
        'my_plugin_settings'
    );

    add_settings_field(
        'my_plugin_option_1',
        'Widget Logo URL',
        'my_plugin_option_1_callback',
        'my_plugin_settings',
        'my_plugin_section'
    );



//if you want to add more fields just add these function and with the help of these function you can manage your more fields

 add_settings_field(
        'my_plugin_option_2',
        'Service ID',
        'my_plugin_option_2_callback',
        'my_plugin_settings',
        'my_plugin_section'
    );

    add_settings_field(
        'my_plugin_option_3',
        'Berrer Token',
        'my_plugin_option_3_callback',
        'my_plugin_settings',
        'my_plugin_section'
    );

    add_settings_field(
        'my_plugin_option_4',
        'Base Color',
        'my_plugin_option_4_callback',
        'my_plugin_settings',
        'my_plugin_section'
    );

	
	    add_settings_field(
        'my_plugin_option_5',
        'Powered By',
        'my_plugin_option_5_callback',
        'my_plugin_settings',
        'my_plugin_section'
    );
	
	
	  add_settings_field(
        'my_plugin_option_6',
        'Enable in Whole website',
        'my_plugin_option_6_callback',
        'my_plugin_settings',
        'my_plugin_section'
    );
	
	
	add_settings_field(
        'my_plugin_option_7',
        'Register website',
        'my_plugin_option_7_callback',
        'my_plugin_settings',
        'my_plugin_section'
    );




    // Add more settings fields as needed
}

// Callback function to display the plugin settings section
function my_plugin_section_callback() {
    echo '<p>Enter your plugin settings below:</p>';
}

// Callback function to display the Option 1 field
function my_plugin_option_1_callback() {
    $options = get_option('my_plugin_options');
    $value = isset($options['option_1']) ? $options['option_1'] : '';
    echo '<input type="text" name="my_plugin_options[option_1]" value="' . esc_attr($value) . '">';
}


//same goes for these function if you are looking for plugin setting just use this 
function my_plugin_option_2_callback() {
    $options = get_option('my_plugin_options');
    $value = isset($options['option_2']) ? $options['option_2'] : '';
    echo '<input type="text" name="my_plugin_options[option_2]" value="' . esc_attr($value) . '">';
}

function my_plugin_option_3_callback() {
    $options = get_option('my_plugin_options');
    $value = isset($options['option_3']) ? $options['option_3'] : '';
    echo '<input type="text" name="my_plugin_options[option_3]" value="' . esc_attr($value) . '">';
}

function my_plugin_option_4_callback() {
    $options = get_option('my_plugin_options');
    $value = isset($options['option_4']) ? $options['option_4'] : '';
    echo '<input type="color" name="my_plugin_options[option_4]" value="' . esc_attr($value) . '">';
}

function my_plugin_option_5_callback() {
    $options = get_option('my_plugin_options');
    $value = isset($options['option_5']) ? $options['option_5'] : '';
    echo '<input type="text" name="my_plugin_options[option_5]" value="' . esc_attr($value) . '">';
}


function my_plugin_option_6_callback() {
    $options = get_option('my_plugin_options');
    $value = isset($options['option_6']) ? $options['option_6'] : '';
    echo '<input type="text" name="my_plugin_options[option_6]" value="' . esc_attr($value) . '"> (please type yes to enable )';
}



function my_plugin_option_7_callback() {
    $options = get_option('my_plugin_options');
    $value = isset($options['option_7']) ? $options['option_7'] : '';
    echo '<input type="text" name="my_plugin_options[option_7]" value="' . esc_attr($value) . '"> (please type in this format (https://abc.com) )';
}


// Sanitize the plugin options
function my_plugin_sanitize_options($options) {
    $sanitized_options = array();
    if (isset($options['option_1'])) {
        $sanitized_options['option_1'] = sanitize_text_field($options['option_1']);
    }

    //same goes for these conditions if you are looking for plugin setting just use this 
    if (isset($options['option_2'])) {
        $sanitized_options['option_2'] = sanitize_text_field($options['option_2']);
    }
    if (isset($options['option_3'])) {
        $sanitized_options['option_3'] = sanitize_text_field($options['option_3']);
    }
    if (isset($options['option_4'])) {
        $sanitized_options['option_4'] = sanitize_text_field($options['option_4']);
    }
	    if (isset($options['option_5'])) {
        $sanitized_options['option_5'] = sanitize_text_field($options['option_5']);
    }
	
	   if (isset($options['option_6'])) {
        $sanitized_options['option_6'] = sanitize_text_field($options['option_6']);
    }
	
	  if (isset($options['option_7'])) {
        $sanitized_options['option_7'] = sanitize_text_field($options['option_7']);
    }
    // Sanitize more options as needed
    return $sanitized_options;
}

// Save the plugin settings
add_action('admin_init', 'my_plugin_save_settings');

function my_plugin_save_settings() {
    if (isset($_POST['my_plugin_options'])) {
        $options = $_POST['my_plugin_options'];
        update_option('my_plugin_options', $options);
    }
}




//callback function
function my_shortcode_function(  ) {
    // Parse the shortcode attributes
    // $atts = shortcode_atts( array(
    //     'message' => 'Hello, World!',
    //     'color' => '#000000'
    // ), $atts );

    // Generate the output for logo
$options = get_option('my_plugin_options');
$logourl = isset($options['option_1']) ? $options['option_1'] : '';


//generate output for service id
$options2 = get_option('my_plugin_options');
$sid = isset($options2['option_2']) ? $options2['option_2'] : '';


//generate output for btk
$btk = get_option('my_plugin_options');
$btk = isset($btk['option_3']) ? $btk['option_3'] : '';



//generate output for base color
$basecolor = get_option('my_plugin_options');
$bc = isset($basecolor['option_4']) ? $basecolor['option_4'] : '';
	
	
	
//generate output for base color
$pw = get_option('my_plugin_options');
$pow = isset($pw['option_5']) ? $pw['option_5'] : '';

//echo MY_PLUGIN_DIR_PATH;
require_once  MY_PLUGIN_DIR_PATH . 'callme.php';
    // Return the output
    //return $value;
}

// Register the shortcode
add_shortcode( 'my_shortcode', 'my_shortcode_function' );




function headcode(){
	
//generate output for service id
$options2 = get_option('my_plugin_options');
$sid = isset($options2['option_2']) ? $options2['option_2'] : '';
	
	//generate output for btk
$btk = get_option('my_plugin_options');
$btk = isset($btk['option_3']) ? $btk['option_3'] : '';
	
	

	//generate output for btk
$webrefrer = get_option('my_plugin_options');
$webrefrer = isset($btk['option_7']) ? $btk['option_7'] : '';	
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/intlTelInput.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/css/intlTelInput.css" >
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/intlTelInput.js"></script>


<script>


// jQuery(document).ready(function(){
//     var input = document.querySelector("#phone");
//   var iti = intlTelInput(input, {
    
//     initialCountry: "ae",


//   });

  //})
  var input = document.querySelector("#phone");
  var iti = intlTelInput(input, {
    
    initialCountry: "ae",


  });

// $("#mymy").intlTelInput({
//   initialCountry: "auto",
// 	separateDialCode: false,
//   formatOnDisplay: true,
// 	nationalMode: false,
// 	// allowDropdown: false,
//   geoIpLookup: function(callback) {
//     $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
//       var countryCode = (resp && resp.country) ? resp.country : "";
//       callback(countryCode);
//     });
//   },
//   utilsScript: "../../build/js/utils.js?1562189064761",
//   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.3/js/utils.js",
// 	preferredCountries: [],
// });

//     function resetIntlTelInput() {
//       if (typeof intlTelInputUtils !== 'undefined') { // utils are lazy loaded, so must check
//           var currentText = telInput.intlTelInput("getNumber", intlTelInputUtils.numberFormat.E164);
//           if (typeof currentText === 'string') { // sometimes the currentText is an object :)
//               telInput.intlTelInput('setNumber', currentText); // will autoformat because of formatOnDisplay=true
//           }
//       }
//     }








     jQuery(document).ready(function($) {
        $('.iti__flag-container').click(function() { 
          var countryCode = $('.iti__selected-flag').attr('title');
          var countryCode = countryCode.replace(/[^0-9]/g,'')
          $('#form-field-Mobnum').val("");
          $('#form-field-Mobnum').val("+"+countryCode+" "+ $('#form-field-Mobnum').val());
       });
		    console.log("<?php echo $sid; ?>");
  
	 setTimeout(function(){
jQuery(".Harismodal").removeAttr('style');
		 console.log("%c Quick Call Loaded Successfull %c","font-weight:bold;background:#E4FF1A;color:#00A3FF;font-size:18px","");
},2000);
	 
	 });


    function callnow(){
        
    //here we are going to get ref url
    // Get the title of the current website page
var title = $(document).prop('title');
// Get the current URL
var urll = window.location.href;
var referralUrl = document.referrer;
if(referralUrl==""){
var refu="https://easywaybusiness.ae/";
	 }
		else{
			refu=referralUrl;
		}
// Extract the hostname from the referral URL
var url = new URL(refu);
var hostname = url.hostname;

// Remove the protocol from the hostname
var protocol = `${url.protocol}//`;
var hostWithoutProtocol = hostname.replace(protocol, "");

// Remove the `www` prefix from the hostname
var hostWithoutWww = hostWithoutProtocol.replace(/^www\./, "");

// Remove the extension from the hostname
var hostWithoutExtension = hostWithoutWww.replace(/\.[^/.]+$/, "");

// Log the hostname without the `www` prefix, extension, or protocol to the console
console.log("Referral hostname:", hostWithoutExtension);

//got one


        
        
       //   var input = document.querySelector("#phone");
     //     var iti = intlTelInput(input);
       //console.log("i am Clicked"+input);
        var tl=30;

//create validation code if matched then trigger
var name=jQuery("#widgetModal-clientName").val();
var phon=jQuery('#phone').val();
// var error = iti.getValidationError();
// Get the phone number entered by the user
var phoneNumber = iti.getNumber();

// Check if the phone number is valid
if (iti.isValidNumber() && name!=undefined && name!="") {
  console.log("Valid phone number: " + phoneNumber);
  
 //here we got exact number as we rewuired
 console.log(phoneNumber);
      callact(tl,phoneNumber,name,refu,hostWithoutExtension,title,urll);
   
   
   
} else {
  console.log("Invalid phone number: " + phoneNumber);
  
  error="Invalid Name / Invalid phone number: " + phoneNumber;
jQuery('.errordiv').html('<div class="errormessage">'+error+'</div>');
  
}

// if(name==undefined || name==""){
// error="Please Insert Your Name";
// jQuery('.errordiv').html('<div class="errormessage">'+error+'</div>');
// //alert("yoo");
// }
// else if(phon==undefined || phon===""){
//     error="Please Insert Your Phone Numer";
//     jQuery('.errordiv').html('<div class="errormessage">'+error+'</div>');
// }

//errormessage
// else{
//         callact(tl);
// }


    }

function callact(tl,phoneNumber,name,refu,hostWithoutExtension,title,urll){
    jQuery('.mainform').html('   <div class="d-flex text-bold justify-content-center align-items-center" id="timer"></div>');
      
    //var time_limit = tl;
    var btk="<?php echo $btk; ?>";
    var sid="<?php echo $sid; ?>";
	    var web="<?php echo $webrefrer; ?>";
    console.log("<?php echo $btk; ?>");
    //here we are going to run our ajax to see what output we are getting 
    jQuery.ajax({
        url: "<?php echo plugin_dir_url(__FILE__).'ajax.php?rt='.$suffix ?>",
      //  url: "https://callback.test/wp-content/plugins/callback/ajax.php",
    
        //http://callback.test/wp-content/plugins/callback/ajax.php
        type: 'post',
        dataType: "json",
        data: {
          callinitiate: phoneNumber,
       //   service_id:service_id,
       service_id:"<?php echo $sid; ?>",
       btk:"<?php echo $btk; ?>",
			webs:"<?php echo $webrefrer; ?>",
          client_name:name,
          website:urll,
          title:title,
          type:'call',
          refu:refu,
          hostWithoutExtension:hostWithoutExtension
        },
        success: function( data ) {

                //  jQuery('.showcontent').html(data);
                  
                  console.log(data);
                  
                  timerstart(tl,data,name,btk,sid,web)
                  
                  //  $('.mainform').html('<div>'+data+'</div>');

        },
        error : function(request,error)
                {
                    console.log("Request error : "+JSON.stringify(request));
                }
      });
    
    
//});
    
    
    
    
    
    
    
    






}


//In this function we will start timer with call request so whenver call second hit our api will redirect us to callback api so with the help of that api we can see who is receiving the call and call is finished or not
function timerstart(tl,cid,name,btk,sid,web){
    
    //here we will change 2 headings
    
    var time_limit = tl;
        var time_out = setInterval(() => {
if(time_limit == 0) {
  $('.mainform').html('<h2 style="text-align:center" class="callrequesid'+cid+'">Hi '+name+'! You will receive a call from our agent shortly</h2>');
} else {
  if(time_limit < 10) {
    getagendetail(cid,name,web);
      
    time_limit = 0 + '' + time_limit;
  }
  $('#timer').html('00:' + time_limit);
  jQuery('#timer').addClass("call"+cid);
  time_limit -= 1; 
}
}, 1000);
    
}

//with the help of timerstart we will shoot cron request so it will insert our request in database so we can see the resul and outcome then we can push ou r request to CRM
function getagendetail(cid,name,web){
     jQuery.ajax({
        url: "<?php echo plugin_dir_url(__FILE__).'ajax.php?rt='.$suffix ?>",
        type: 'post',
       // dataType: "json",
        data: {
          sid_in: cid,
			webs:web,
			btk:"<?php echo $btk; ?>",
			sid:"<?php echo $sid; ?>"
        },
        success: function( data ) {

                //  jQuery('.showcontent').html(data);
                  
                  console.log(data);
                 //  return data;
                   
                    // var agendt= getagendetail(cid);
      if(data!="" && data!=undefined){
           $('.mainform').html('<h2 style="text-align:center" class="callrequesid'+cid+'">Hi '+name+'! '+data+' is calling you.</h2>');
      }
                   
                 //timerstart(tl,data,name)
                  
                  //  $('.mainform').html('<div>'+data+'</div>');

        },
        error : function(request,error)
                {
                    console.log("Request error : "+JSON.stringify(request));
                }
      });
    
}
console.log("Bhaya");
</script>

<?php



}
add_action('wp_footer', 'headcode',10);



function headache(){
    $suffix =  mt_rand(1000, 9999);
    wp_enqueue_style('intlTelInput-css', plugin_dir_url(__FILE__).'style.css');
           wp_enqueue_script('iti-load-utils', 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js?v123='.$suffix, '', '', true);
           wp_enqueue_script('intlTelInput', 'https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/intlTelInput.js?v123='.$suffix, '', '', true);
           wp_enqueue_script('intlTelInput-js', 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.5/build/js/intlTelInput.min.js?v123='.$suffix, '', '', true);
          // wp_enqueue_script('jqquery', 'https://code.jquery.com/jquery-2.2.4.min.js?v123='.$suffix, '', '', true);
          // wp_enqueue_script('jqquery', 'https://code.jquery.com/jquery-2.2.4.min.js?v123='.$suffix, '', '', true);
   
           
           wp_enqueue_style('intlTelInput-css', 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.5/build/css/intlTelInput.min.css');
           wp_enqueue_script('jquery');
}
add_action('wp_footer', 'headache',1);






//condition matched or not
function my_shortcode_in_head() {
	$p = get_option('my_plugin_options');
$data = isset($p['option_6']) ? $p['option_6'] : '';
  //$data = ''; // Set the default value of the data variable
  

  
  // Output the shortcode in the head section if data is available
  if ($data=="yes") {
    add_action('wp_head', function() use ($data) {
      echo do_shortcode('[my_shortcode]');
    });
  }
}
add_action('init', 'my_shortcode_in_head');








?>