<?php

if (!isset($_POST['formtype']) || $_POST['formtype'] !== 'email') {
    if (isset($_POST['env']) && $_POST['env'] == 'mobile') {
        header('Location: http://www.cse.msu.edu/~savelama/tc349/projects/final-site/mobile/contact.html');
    } else {
        header('Location: http://www.cse.msu.edu/~savelama/tc349/projects/final-site/contact.html');
    }
    exit;
} else {
    $contactName = $_POST['contact_name'];
    $contactEmail = $_POST['contact_email'];
    $contactMsg = $_POST['contact_message'];
    
    if (!isset($contactName)) {
        $error = "You must provide a name!";
    } else if (!isset($contactEmail)) {
        $error = "You must provide a contact e-mail address!";
    } else if (!isset($contactMsg)) {
        $error = "You must provide a message!";
    }
    
    if (isset($error)) {
        if (isset($_POST['env']) && $_POST['env'] == 'mobile') {
            header('Location: http://www.cse.msu.edu/~savelama/tc349/projects/final-site/mobile/contact.html?e='.urlencode($error)); 
        } else {
            header('Location: http://www.cse.msu.edu/~savelama/tc349/projects/final-site/contact.html?e='.urlencode($error)); 
        }
        exit;
    }
    
    $message    = "Name : {$contactName} \n\n";
    $message   .= "Contact email : {$contactEmail}\n\n";
    $message   .= "Message : \n\n {$contactMsg}";
    
    mail('savelama@gmail.com', "Website Contact Form ({$contactEmail})", $message);
    
    if (isset($_POST['env']) && $_POST['env'] == 'mobile') {
        header('Location: http://www.cse.msu.edu/~savelama/tc349/projects/final-site/mobile/contact.html?s='.urlencode('Thank you contacting Matthew! He will respond to you as soon as possible.'));
    } else {
        header('Location: http://www.cse.msu.edu/~savelama/tc349/projects/final-site/contact.html?s='.urlencode('Thank you contacting Matthew! He will respond to you as soon as possible.'));
    }
    exit;
}
?>
