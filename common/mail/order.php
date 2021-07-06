<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Афиша Ресторан-Онлайн';

?>


	<div class="table-responsive">
		<table class="table tatable-responsive table-striped">
			<thead class="thead-dark table-sm">
				<tr>
					
					<th scope="col">Название</th>
					<th scope="col">Цена</th>
					<th scope="col">Количество</th>
					<th scope="col">Сумма</th>
					
				</tr>
			</thead>
			<tbody class="table-sm">
				
				<?php foreach ($session['cart'] as $id => $item) : ?>
					<tr>
						
						<td><?= $item['name']; ?></td>
						<td><?= $item['price']; ?></td>
						<td style="width: 230px;">
				        	<div class="input-group product-details mb-3" style="margin-bottom: 0 !important;">
			                    <? if ($item['type'] != 'mesto') : ?> 
			                        <button type="button" class="quantity-left-minus btn modal-cart"  data-type="minus" data-field="" data-id="<?= $id; ?>" data-price="<?= $item['price']; ?>" style="border-color: #c49b63 !important; height: 50px !important;">
			                       <i class="icon-minus"></i>
			                        </button>
			                    <? endif; ?>
			                        
			                    	<input type="text" id="quantity_<?= $id; ?>" name="quantity" class="form-control input-number" value="<?= $item['qty']; ?>" min="1" max="100" data-id="<?= $id; ?>" data-price="<?= $item['price']; ?>" data-status="<?= $item['type']; ?>" style="color: #333 !important; border-color: #c49b63 !important; margin-right: 5px; margin-left: 5px; font-size: 16px; height: 50px !important;" readonly>
			                    
			                    <? if ($item['type'] != 'mesto') : ?>
			                        <button type="button" class="quantity-right-plus btn modal-cart" data-type="plus" data-field="" data-id="<?= $id; ?>" data-price="<?= $item['price']; ?>" style="border-color: #c49b63 !important; height: 50px !important;">
			                         <i class="icon-plus"></i>
			                     	</button>
								<? endif; ?>
			                    				             	 
			          	    </div>						
						</td>
						<td><?= intval($item['price'])*intval($item['qty']); ?></td>

					</tr>
				<?php endforeach; ?>
					
					<tr>
						<td></td>
						<td></td>
						<td colspan="2">Всего: </td>
						<td><?= $session['cart.qty']; ?></td>
						<td>шт.</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td colspan="2">На сумму: </td>
						<td><?= $session['cart.sum']; ?></td>
						<td>р.</td>
					</tr>					
			</tbody>
		</table>
		
	</div> 