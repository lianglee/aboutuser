<?php
/**
 * Open Source Social Network
 *
 * @packageOpen Source Social Network
 * @author    Open Social Website Core Team <info@informatikon.com>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      http://www.opensource-socialnetwork.org/licence
 */
 ?>
<table class="aboutuser">
  <tr>
    <th scope="row"><?php echo ossn_print('name');?></th>
    <td><?php echo $params['user']->fullname;?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo ossn_print('birthdate');?></th>
    <td><?php echo $params['user']->birthdate;?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo ossn_print('gender');?></th>
    <td><?php echo $params['user']->gender;?></td>
  </tr>  
  <tr>
    <th scope="row"><?php echo ossn_print('age');?></th>
    <td><?php echo about_user_age($params['user']->birthdate);?></td>
  </tr>
</table>
