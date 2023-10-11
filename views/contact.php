<?php
/** @var $this \tryu\phpmvc\view */
/** @var $model \app\models\ContactForm */

use tryu\phpmvc\form\TextareaField;

$this->title = 'Contact';
?>

<h1>Contact us</h1>

<?php $form = \tryu\phpmvc\form\Form::begin('', 'post') ?>
  <?php echo $form->field($model, 'subject') ?>
  <?php echo $form->field($model, 'email') ?>
  <?php echo new TextareaField($model, 'body') ?>
  <button type="submit" class="btn btn-primary">Submit</button>
<?php tryu\phpmvc\form\Form::end() ?>