<?php
/**
* @file
* Contains \Drupal\rsvplist\Form\RSVPForm
*/
namespace Drupal\rsvplist\Form;
use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class RSVPForm extends FormBase {
/**
* (@inheritdoc)
*/
  public function getFormId(){
      return 'rsvplist_email_form';
  }
  /**
  * (@inheritdoc)
  */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $node = \Drupal::routeMatch()->getParameter('node');
    $nid = $node->nid->value;
    $form['email'] = array(
        '#title'=> t('Email Address'),
        '#type'=> 'textfield',
        '#size'=> 25,
        '#description'=> t('We will send updates to the email address your provide'),
        '#required'=> true
    );
    $form['submit'] = array(
        '#type' => 'submit',
        '#value'=> t('RSVP'),
     );
    $form['nid'] = array(
        '#type'=> 'hidden',
        '#value'=> $nid,
    );
    return $form;
  }
  public function validateForm(array &$form, FormStateInterface $form_state){
    $value = $form_state->getValue('email');
    if($value == !\Drupal::service('email.validator')->isValid($value)){
      $form_state->setErrorByName('email', t('The email address %email is not valid.', array('%mail'=> $value)));
    }
  }
  public function submitForm(array &$form, FormStateInterface $form_state){
    //drupal_set_message(t('The Form is Working'));
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    db_insert('rsvplist')->fields(
      array(
        'mail'    => $form_state->getValue('email'),
        'nid'     => $form_state->getValue('nid'),
        'uid'     => $user->id(),
        'created' => time(),
    ))
    ->execute();
    drupal_set_message(t('Thanks for your RSVP, you are on the list for the event'));
  }
}
 ?>
