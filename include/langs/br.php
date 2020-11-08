<?php 

	/*
	#############################################
						Brasilian Language File
	#############################################
	How To:
	- Always follow the standards;
	- Do not modify variable names;
	- Do not left any variable without a value.
	*/

	$lang['lang'][0] = "br";
	$lang['lang'][1] = "en";
	
	/*
	##################- Basic Info-#####################
	Standards:
	- Starts with lbi_;
	*/
	
	$lang['lbi_day'] = "Dia";
	
	/*
	##############################################
						Classes Information
	##############################################
	They usually show some errors or information to the user;
	Standards:
	- Starts with classes_NAMEOFTHECLASS_FUNCTION_;
	*/
	
	$lang['classes_news_add_empty'] = "Please fill all the fields!";
	$lang['classes_news_add_fail_pre'] = "The given date isn't valid!";
	$lang['classes_news_add_sql_fail'] = "Unable to add the news to the database!";
	$lang['classes_news_add_success'] = "The news has been added successfuly";
	$lang['classes_news_load_invalid_id'] = "Não encontramos nenhuma notícia com este ID";
	$lang['classes_news_update_success'] = "The news has being sucessfuly updated!";
	$lang['classes_news_update_error'] = "There was an error trying to update, try again!";

	$lang['classes_poll_add_empty'] = "Preencha todos os campos!";
	$lang['classes_poll_add_sql_fail'] = "Unable to add the poll to the database!";
	$lang['classes_poll_add_success'] = "The poll has been added successfuly";
	$lang['classes_poll_vote_not_logged'] = "Você precisa estar logado para votar!";
	
	$lang['classes_account_add_empty'] = "Preencha todos os campos!";
	$lang['classes_account_add_dif_pass'] = "As senhas não conferem!";
	$lang['classes_account_add_dif_mail'] = "Os e-mails não conferem!";
	$lang['classes_account_add_wrong_captcha'] = "O código fornecido está incorreto!";
	$lang['classes_account_add_long_login'] = "Seu login é muito longo!";
	$lang['classes_account_add_long_mail'] = "Seu e-mail é muito longo!";
	$lang['classes_account_add_login_in_use'] = "O seu login já esta em uso!";
	$lang['classes_account_add_login_invalid'] = "Seu login esta com caracteres ilegais!";
	$lang['classes_account_add_email_in_use'] = "Este e-mail já esta em uso!";
	$lang['classes_account_add_email_invalid'] = "Por favor entre um e-mail válido!";
	$lang['classes_account_add_insert_error'] = "Some unknow error happened! Try again later.";
	$lang['classes_account_add_success'] = "A sua conta foi criada com sucesso!";
	$lang['classes_account_login_logged_already'] = "Player was already logged in when attempting to login again.";
	$lang['classes_account_load_invalid_id'] = "ID inexistente!";
	$lang['classes_account_login_empty'] = "Preencha todos os campos!";
	$lang['classes_account_login_invalid_login'] = "Login inexistente!";
	$lang['classes_account_login_wrong_password'] = "Senha incorreta!";
	$lang['classes_account_login_success'] = "Logado com sucesso!";
	$lang['classes_account_update_not_logged'] = "Player wasn't logged in when trying to update account info.";
	$lang['classes_account_update_empty'] = "Preencha todos os campos!";
	$lang['classes_account_update_dif_pass'] = "As senhas não conferem!";
	$lang['classes_account_update_old_pass'] = "A senha atual esta incorreta!";
	$lang['classes_account_update_unable_password'] = "Não foi possível modificar sua senha!";
	$lang['classes_account_update_success_password'] = "Sua senha foi alterada com sucesso!";
	$lang['classes_account_add_prohibited_mail'] = "Não aceitamos e-mails temporários!";
	
	/*
	##################- Files Variables -#####################
	Standards:
	- Starts with SESSION_FILE_;
	*/
	$lang['account_new_newuser'] = "Coloque o login desejado";
	
	$lang['account_home_admin_area'] = "Admin Area";
	$lang['account_home_admin_area_desc'] = "Add/Edit news and polls here!";
	$lang['account_home_logout'] = "Sair";
	$lang['account_home_image'] = "Cartão";
	$lang['account_home_image_desc'] = "Crie um cartão com as informações do seu char!";
	$lang['account_home_logout_desc'] = "Encerre a sua sessão com segurança.";
	
	$lang['account_card_title'] = "Crie seu cartão";
	$lang['account_card_name'] = "Nome do Char";
	$lang['account_card_background'] = "Fundo";
	
	$lang['poll_result_wrong_id'] = "Não encontramos nenhuma enquete com este ID!";
	$lang['poll_result_no_vote'] = "Ninguém votou ainda!";
	/*
	##################- Left Menu -#####################
	Standards:
	- Starts with lm_;
	*/
	$lang['lm_general'] = "Principal";
		$lang['lm_homepage'] = "Página Principal";
		$lang['lm_downloads'] = "Downloads";
		$lang['lm_staff'] = "Equipe";
		$lang['lm_archive'] = "Arquivo";
		$lang['lm_myacc'] = "Minha Conta";
	$lang['lm_library'] = "Biblioteca";
		$lang['lm_items'] = "Items";
		$lang['lm_creatures'] = "Criaturas";
		$lang['lm_exp_table'] = "Tabela de experiência";
	$lang['lm_community'] = "Comunidade";
		$lang['lm_screenshots'] = "Screenshots";
		$lang['lm_highscores'] = "Highscores";
		$lang['lm_interviews'] = "Entrevistas";
	
	/*
	#################- Right Menu -#####################
	Standards:
	- Starts with rm_;
	*/
	$lang['rm_calculator'] = "Calculadora";
	$lang['rm_current_exp'] = "Exp atual";
	$lang['rm_wanted_lvl'] = "level desejado";
	$lang['rm_calculate'] = "Calcular";
	$lang['rm_links'] = "Links";
	$lang['rm_ads'] = "Ads";

	/*
	###################- Middle -#####################
	Standards:
	- Starts with mdl_;
	- This vars are for all the middle pages;
	*/
	// Indicates the place
	$lang['mdl_general'] = "Principal";
		$lang['mdl_homepage'] = "Página Principal";
		$lang['mdl_archive'] = "Arquivo";
		$lang['mdl_downloads'] = "Downloads";
		$lang['mdl_staff'] = "Equipe";
	$lang['mdl_account'] = "Conta";
		$lang['mdl_account_home'] = "Principal";
		$lang['mdl_account_login'] = "Login";
		$lang['mdl_account_new'] = "Nova Conta";
		$lang['mdl_zezenia'] = "Zezenia";
		$lang['mdl_account_card'] = "Cartões";
	$lang['mdl_news_archive'] = "Arquivo de Notícias";
	$lang['mdl_library'] = "Biblioteca";
		$lang['mdl_creatures'] = "Criaturas";
		$lang['mdl_items'] = "Items";
			$lang['mdl_amulets'] = "Amuletos";
			$lang['mdl_armors'] = "Armaduras";
			$lang['mdl_boots'] = "Botas";
			$lang['mdl_bracers'] = "Braceletes";
			$lang['mdl_distance'] = "Distância";
			$lang['mdl_gauntlets'] = "Luvas";
			$lang['mdl_helmets'] = "Elmos";
			$lang['mdl_legs'] = "Calças";
			$lang['mdl_rings'] = "Anéis";
			$lang['mdl_shields'] = "Escudos";
			$lang['mdl_wands'] = "Varinhas";
			$lang['mdl_weapons'] = "Armas";
			$lang['mdl_foods'] = "Comidas";
	$lang['lm_spell_list'] = "Lista de Magias";
		$lang['mdl_exp_table'] = "Tabela de experiência";
			$lang['mdl_exp_level'] = "Level";
			$lang['mdl_exp_exp'] = "Experiência";
			$lang['mdl_exp_tnl'] = "Para o próximo level";
	$lang['mdl_community'] = "Comunidade";
		$lang['mdl_screenshots'] = "Screenshots";
		$lang['mdl_highscores'] = "Ranking";
		$lang['mdl_interviews'] = "Entrevistas";
	// Indicates the description of the place
	$lang['mdl_home'] = "Notícias";
	$lang['mdl_account_welcome'] = "Minha Conta";
	$lang['mdl_login_user'] = "Nome";
		$lang['mdl_login_pass'] = "Senha";
		$lang['mdl_login_confirm_pass'] = "Confirme Senha";
		$lang['mdl_login_email'] = "E-mail";
		$lang['mdl_login_confirm_email'] = "Confirme E-mail";
		$lang['mdl_login_captcha_desc'] = "Não há diferença entre maiúsculo e minúsculo";
		$lang['mdl_login_new'] = "Não tem uma conta ainda?";
		$lang['mdl_login_new_link'] = "Crie uma agora!";
	$lang['mdl_staff_list'] = "Equipe";
		$lang['mdl_staff_admins'] = "Administradores";
		$lang['mdl_staff_translators'] = "Tradutores";
		$lang['mdl_staff_zezenia'] = "Equipe do Zezenia";
	$lang['mdl_items_list'] = "Lista de Items";
		$lang['mdl_amulets_list'] = "Lista de Amuletos";
		$lang['mdl_armors_list'] = "Lista de Armaduras";
		$lang['mdl_boots_list'] = "Lista de Botas";
		$lang['mdl_bracers_list'] = "Lista de Braceletes";
		$lang['mdl_distance_list'] = "Lista de Distância";
		$lang['mdl_gauntlets_list'] = "Lista de Luvas";
		$lang['mdl_helmets_list'] = "Lista de Elmos";
		$lang['mdl_legs_list'] = "Lista de Calças";
		$lang['mdl_rings_list'] = "Lista de Anéis";
		$lang['mdl_shields_list'] = "Lista de Escudos";
		$lang['mdl_wands_list'] = "Lista de Varinhas";
		$lang['mdl_weapons_list'] = "Lista de Armas";
	$lang['mdl_creatures_list'] = "Lista de Criaturas";
	$lang['mdl_spell_list'] = "Lista de Magias";
		$lang['mdl_spell_suport'] = "Magias de Suporte";
		$lang['mdl_spell_misc'] = "Magias Variadas";
		$lang['mdl_spell_attack'] = "Magias de Ataque";
	$lang['mdl_highscore_main'] = "Ranking";
		$lang['mdl_highscore_rank'] = "Rank";
		$lang['mdl_highscore_name'] = "Nome";
		$lang['mdl_highscore_level'] = "Level";
		$lang['mdl_highscore_exp'] = "Experiência";
		$lang['mdl_highscore_class'] = "Classe";
		$lang['mdl_highscore_variation'] = "Variação";
		$lang['mdl_highscore_statiscs_for'] = "Estatísticas para";

	// Lists vars
	$lang['mdl_list_name'] = "Nome";
	$lang['mdl_list_attack'] = "Ataque";
	$lang['mdl_list_defence'] = "Defesa";
	$lang['mdl_list_distance'] = "Distância";
	$lang['mdl_list_magic'] = "Magia";
	$lang['mdl_list_dropped_by'] = "Dropado por";
	$lang['mdl_list_heal'] = "Recupera";


?>