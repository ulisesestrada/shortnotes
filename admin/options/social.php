<?php
    $options[] = array( "name" => "Social",
    					"sicon" => "social.png",
						"type" => "heading");

    $options[] = array( "name" => "Twitter URL",
                        "id" => $shortname."_twitter",
                        "std" => "",
                        "type" => "text");
						
	$options[] = array( "name" => "Facebook URL",
                        "id" => $shortname."_facebook",
                        "std" => "",
                        "type" => "text");
    
    $options[] = array( "name" => "YouTube URL",
                        "id" => $shortname."_youtube",
                        "std" => "",
                        "type" => "text");
    
    $options[] = array( "name" => "Vimeo URL",
                        "id" => $shortname."_vimeo",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "Dribbble URL",
                        "id" => $shortname."_dribbble",
                        "std" => "",
                        "type" => "text");
    
    $options[] = array( "name" => "Google URL",
                        "id" => $shortname."_google",
                        "std" => "",
                        "type" => "text");
    
    $options[] = array( "name" => "Pinterest URL",
                        "id" => $shortname."_pinterest",
                        "std" => "",
                        "type" => "text");
    /*
    $options[] = array( "name" => "Skype User",
                        "id" => $shortname."_skype",
                        "std" => "#",
                        "type" => "text");
    */
    
    $options[] = array( "name" => "Linkedin URL",
                        "id" => $shortname."_linkedin",
                        "std" => "",
                        "type" => "text");

    
    $options[] = array( "name" => "External RSS URL",
                        "desc" => "Add external RSS URL, like Feedburner, etc. This will overwrite the regular blog RSS, if enabled.",
                        "id" => $shortname."_extrss",
                        "std" => "",
                        "type" => "text")



?>