<?php
/**
* @file
* Contains \Drupal\rsvplist\Form\RSVPSettingsForm
*/
namespace Drupal\rsvplist\Form;
use Drupal\Core\Form\ConfigFormBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Form\FormStateInterface;
/**
* Define a form to configure RSVP List module settings
*/
class RSVPSettingsForm extends ConfigFormBase
{

  /**
  * { @inheritdoc }
  */
  public function getFormID(){
    return 'rsvplist_admin_settings';
  }
  protected function getEditableConfigNames() {
    return  ['rsvplist.settings'];
  }
  public function buildForm(array $form, FormStateInterface $form_state, Request $request = NULL){
    $types = node_type_get_names();
    //print_r($types); exit();
    $config = $this->config('rsvplist.settings');
  //  print_r($config); exit();
    $form['rsvplist_types'] = array(
      '#type' => 'checkboxes',
      '#title' => $this->t('The content type to enable RSVP collection for'),
      "#default_value" => $config->get('allowed_types'),
      '#options' => $types,
      '#description' => t('On the specified node types, an RSVP option will be available and can be enabled while node is being edited')
    );
    $form['array_filter'] = array('#type'=>'value', '#value'=> TRUE);
    return parent::buildForm($form, $form_state);
  }
  /**
  * { @inheritdoc }
  */
  public function submitForm(array &$form, FormStateInterface $form_state){
    $allowed_types = array_filter($form_state->getValue('rsvplist_types'));
//print_r($allowed_types); exit();
    sort($allowed_types);
      //echo $allowed_types; exit();
    //  print_r($this->config('rsvplist.settings')); exit();
    $this->config('rsvplist.settings')
    ->set('allowed_types', $allowed_types)
    ->save();
    parent::submitForm($form, $form_state);
  }
}

 ?>
