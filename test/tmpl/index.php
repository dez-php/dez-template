<?php
/**
 * @var Compiler $this
*/
use Dez\Template\Core\Compiler;

$this->layout('shop::layout', ['title' => __FILE__]);

echo __FILE__;

?>
<?php $this->start('test1'); ?>
<h1>Test</h1>
<h2><?= $test; ?></h2>
<hr>
<p>
    <?= $this->fetch('index/welcome'); ?>
</p>
<hr>
<p>
    <?= $this->fetch('index/welcome'); ?>
</p>
<hr>
test1<hr>
<?php $this->stop(); ?>
<?php $this->start('test2'); ?>
<?= $this->fetch('index/welcome'); ?>
<?php $this->stop(); ?>