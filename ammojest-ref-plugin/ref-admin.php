<?php 

/*
Plugin Name: ref admin
Description: A test plugin to demonstrate wordpress functionality
Author: Ammojest
Version: 0.1
*/

function add_style() {
    wp_register_style('style', plugins_url('/css/style.css',__FILE__ ));
    wp_enqueue_style('style');
    wp_register_script('checkbox', plugins_url('/js/style.css',__FILE__ ));
    wp_enqueue_script('checkbox');
}

add_action( 'admin_init','add_style');


add_action('admin_menu', 'ref_a_friend_admin');

function ref_a_friend_admin(){
    add_menu_page( 'Test Plugin Page', 'Ref A Friend Admin', 'manage_options', 'test-plugin', 'test_init' );
}



function test_init() {

    // 1st Method - Declaring $wpdb as global and using it to execute an SQL query statement that returns a PHP object
    global $wpdb;
    $rows = $wpdb->get_results( "SELECT prl.`date`,
    prl.`type`,
    prl.`user_id` AS `Referrer ID`,
    usr.`display_name` AS `Referrer Name`,
    usr.`user_email` AS `Referrer Email`,
    referee.`user_id` AS `Referee ID`,
    referee.`Display_Name` AS `Referee Name`,
    referee.`user_email` AS `Referee Email`,
    ord1.`FirstOrderID`,
    ord1.`FirstOrderDate`
    FROM `wpsk_wc_points_rewards_user_points_log` prl
    INNER JOIN    (SELECT prl.`date`,
     prl.`type`,
     prl.`points`,
     prl.`user_id`,
     usr.`display_name`,
     usr.`user_email`
                        FROM `wpsk_wc_points_rewards_user_points_log` prl
                        LEFT OUTER JOIN `wpsk_users` usr ON prl.`user_id` = usr.`id`
                        WHERE prl.`type` = 'referee-signup'
                        AND prl.`user_id` IN (SELECT DISTINCT(`meta_value`)
     FROM `wpsk_postmeta`
     WHERE `meta_key` = '_Customer_user')) referee ON prl.`date` = referee.`date`
    INNER JOIN `wpsk_users` usr ON prl.`user_id` = usr.`id`
    LEFT OUTER JOIN    (SELECT MIN(ord.`id`) AS `FirstOrderID`,
          MIN(ord.`post_date`) AS `FirstOrderDate`,
          meta.`meta_value` AS `Referee ID`
                        FROM `wpsk_posts` ord
                        LEFT OUTER JOIN (SELECT `post_id`,
       `meta_value`
                                         FROM wpsk_postmeta
                                         WHERE `meta_key` = '_customer_user') meta ON ord.`id` = meta.`post_id`
                        WHERE ord.`post_status` = 'wc-completed'  
                        AND ord.`post_type` = 'shop_order'
                        GROUP BY meta.`meta_value`) ord1 ON referee.`user_id` = ord1.`Referee ID`
         AND ord1.`FirstOrderDate` > prl.`date`
    WHERE prl.`type` = 'referrer-signup'
    ORDER BY prl.`date` DESC
               ", OBJECT );


        // echo '<pre>'.print_r($rows).'</pre>';

?>

        <h1>Referral Table pulled in from SQL Database</h1>
        <h2>Reffers in this list have had a confirmed order and need to have 400 points adding to their account</h2>
        <table>
        <tbody>
        <tr>
            <th>Date</th>
            <th>Referral</th>
            <th>Referee</th>
            <th>Points Applied?</th>
        </tr>
        <?php foreach($rows as $row) {
            ?>
                <tr>
                    <td> <?php echo $row->{'date'};?></td>
                    <td> <?php echo $row->{'Referee Email'};?></td>
                    <td> <?php echo $row->{'Referrer Email'};?></td>
                    <td><input id="checkBox" type="checkbox"></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

<?php }



?>