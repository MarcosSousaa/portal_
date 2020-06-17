<?php 
class Utilities{
	
	public static function loadTemplateBase($user,$menu,$card){		
		$data = array(
			'nome_usuario' => $user->getName(),
			'menu_class' => $menu->getClass(),
			'menu_caminho' => $menu->getCaminho(),
			'menu_descricao' => $menu->getDescricao(),
			'name' => $user->getGroupName($user->getId()),
			'card_img' => $card->getImg(),
			'card_caminho' => $card->getCaminho(),
			'card_titulo' => $card->getTitulo()

		);				
		return $data;
	}
}
