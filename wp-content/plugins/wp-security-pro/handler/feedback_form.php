<?php
class mo_FeedbackHandler
{
    function __construct()
    {
        add_action('admin_init', array($this, 'mo_wpns_feedback_actions'));
    }

    function mo_wpns_feedback_actions()
    {

        global $mo_MoWpnsUtility, $mo_dirName;

        if (current_user_can('manage_options') && isset($_POST['option'])) {
            switch ($_REQUEST['option']) {
                case "mo_skip_feedback_wpns":
                case "mo_feedback_wpns":
                  $this->wpns_handle_feedback($_POST);				        break;

            }
        }
    }

    function wpns_handle_skip_feedback($postdata){
        do_action('mo_wpns_show_message',mo_MoWpnsMessages::showMessage('FEEDBACK'),'CUSTOM_MESSAGE');
        deactivate_plugins( dirname(dirname(__FILE__ ))."\\mo-wpns.php");
    }

    function wpns_handle_feedback($postdata)
    {

        $user = wp_get_current_user();

        $message = 'Plugin Deactivated';
        $deactivate_reason_message = array_key_exists('query_feedback_wpns', $_POST) ? htmlspecialchars($_POST['query_feedback_wpns']) : false;


        $reply_required = '';
        if (isset($_POST['get_reply']))
            $reply_required = htmlspecialchars($_POST['get_reply']);
        if (empty($reply_required)) {
            $reply_required = "don't reply";
            $message .= '<b style="color:red";> &nbsp; [Reply :' . $reply_required . ']</b>';
        } else {
            $reply_required = "yes";
            $message .= '[Reply :' . $reply_required . ']';
        }


        $message .= ', Feedback : ' . $deactivate_reason_message . '';

        if (isset($_POST['rate']))
            $rate_value = htmlspecialchars($_POST['rate']);

        $message .= ', [Rating :' . $rate_value . ']';

        $email = $_POST['query_mail'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = get_option('mo_wpns_admin_email');
            if (empty($email))
                $email = $user->user_email;
        }
        $phone = get_option('mo_wpns_admin_phone');
        $feedback_reasons = new mo_MocURL();
        global $mo_MoWpnsUtility;
        if (!is_null($feedback_reasons)) {
            if (!$mo_MoWpnsUtility->is_curl_installed()) {
                deactivate_plugins(dirname(dirname(__FILE__ ))."\\mo-wpns.php");
                wp_redirect('plugins.php');
            } else {
                $submited = json_decode($feedback_reasons->send_email_alert($email, $phone, $message), true);
                if (json_last_error() == JSON_ERROR_NONE) {
                    if (is_array($submited) && array_key_exists('status', $submited) && $submited['status'] == 'ERROR') {
                        do_action('mo_wpns_show_message',$submited['message'],'ERROR');

                    } else {
                        if ($submited == false) {
                            do_action('mo_wpns_show_message','Error while submitting the query.','ERROR');
                        }
                    }
                }

                deactivate_plugins(dirname(dirname(__FILE__ ))."\\mo-wpns.php");
                do_action('mo_wpns_show_message','Thank you for the feedback.','SUCCESS');

            }
        }
    }

}new mo_FeedbackHandler();
