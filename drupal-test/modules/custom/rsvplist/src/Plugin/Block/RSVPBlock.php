<?php
/**
 * @file
 * contains \Drupal\rsvplist\Plugin\Block/RSVPBlock
 */
 namespace Drupal\rsvplist\Plugin\Block;
 use Drupal\Core\Block\BlockBase;
 use Drupal\Core\Session\AccountInterface;
 Use Drupal\Core\Access\AccessResult;
/**
* Provides an 'RSVP' List Block
* @Block(
* id="rsvp_block",
* admin_lael = @Translation("RSVP Block"),
*)
*/
class RSVPBlock extends BlockBase
{
  /**
  *{ @inheritdoc }
  */
  public function build(){
    return \Drupal::formBuilder()->getForm('Drupal\rsvplist\Form\RSVPForm');
  }
  public function blockAccess(AccountInterface $account){
    $node = \Drupal::routeMatch()->getParameter('node');
    $nid  = $node->nid->value;
    if(is_numeric($nid)){
      return AccessResult::allowedIfHasPermission($account, 'view rsvplist');
    }
    return AccessResult::forbidden();
  }
}

 ?>
