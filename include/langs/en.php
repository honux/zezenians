<?php 

	/*
	#############################################
						English Language File
	#############################################
	How To:
	- Always follow the standards;
	- Do not modify variable names;
	- Do not left any variable without a value or at maximium leave it empty;
	*/

	$lang['lang'][0] = "en";
	$lang['lang'][1] = "br";
	
	/*
	##################- Basic Info-#####################
	Standards:
	- Starts with lbi_;
	*/
	
	$lang['lbi_day'] = "Day";
	
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
	$lang['classes_news_load_invalid_id'] = "There is no news with this ID!";
	$lang['classes_news_update_success'] = "The news has being sucessfuly updated!";
	$lang['classes_news_update_error'] = "There was an error trying to update, try again!";

	$lang['classes_poll_add_empty'] = "Please fill all the fields!";
	$lang['classes_poll_add_sql_fail'] = "Unable to add the poll to the database!";
	$lang['classes_poll_add_success'] = "The poll has been added successfuly";
	$lang['classes_poll_vote_not_logged'] = "You must be logged in to vote!";
	
	$lang['classes_account_add_empty'] = "Please fill all the fields!";
	$lang['classes_account_add_dif_pass'] = "The passwords doesn't match!";
	$lang['classes_account_add_dif_mail'] = "The e-mails doesn't match!";
	$lang['classes_account_add_wrong_captcha'] = "You have entered the wrong captcha!";
	$lang['classes_account_add_long_login'] = "Your login name is too long!";
	$lang['classes_account_add_long_mail'] = "Your e-mail is too long!";
	$lang['classes_account_add_login_in_use'] = "There is someonelse using this login name!";
	$lang['classes_account_add_login_invalid'] = "There are some ilegal characters on your login name or name.";
	$lang['classes_account_add_email_in_use'] = "There is someonelse using this e-mail!";
	$lang['classes_account_add_email_invalid'] = "Please enter a valid e-mail!";
	$lang['classes_account_add_insert_error'] = "Some unknow error happened! Try again later.";
	$lang['classes_account_add_success'] = "Your account has being created successfully!";
	$lang['classes_account_login_logged_already'] = "Player was already logged in when attempting to login again.";
	$lang['classes_account_load_invalid_id'] = "There is no news with this ID!";
	$lang['classes_account_login_empty'] = "Please fill all the fields!";
	$lang['classes_account_login_invalid_login'] = "There is no such username!";
	$lang['classes_account_login_wrong_password'] = "Wrong password!";
	$lang['classes_account_login_unable_session_file'] = "Unable to create Zezenia Session File!";
	$lang['classes_account_login_success'] = "Successfuly logged in.";
	$lang['classes_account_update_not_logged'] = "Player wasn't logged in when trying to update account info.";
	$lang['classes_account_update_empty'] = "Please fill all the fields!";
	$lang['classes_account_update_dif_pass'] = "The passwords doesn't match!";
	$lang['classes_account_update_old_pass'] = "The current password doesn't match!";
	$lang['classes_account_update_unable_password'] = "Unable to change your password now!";
	$lang['classes_account_update_success_password'] = "Your password has being successfully updated!";
	$lang['classes_account_add_prohibited_mail'] = "We do not accept temporary e-mails!";
	
	$lang['classes_zezenia_login_wrong'] = "Invalid login name or password!";
	
	/*
	##################- Files Variables -#####################
	Standards:
	- Starts with SESSION_FILE_;
	*/
	$lang['account_new_newuser'] = "Please enter an account name.";
	
	$lang['account_home_admin_area'] = "Admin Area";
	$lang['account_home_admin_area_desc'] = "Add/Edit news and polls here!";
	$lang['account_home_image'] = "Card";
	$lang['account_home_image_desc'] = "Make your card with your character description!";
	$lang['account_home_logout'] = "Logout";
	$lang['account_home_logout_desc'] = "End your session safely.";
	
	$lang['account_card_title'] = "Create your card";
	$lang['account_card_name'] = "Character Name";
	$lang['account_card_background'] = "Background";
	
	$lang['poll_result_wrong_id'] = "There is no poll with this ID!";
	$lang['poll_result_no_vote'] = "Nobody voted on that poll yet!";
	
	$lang['items_foods_foods_list'] = "Foods List";
	/*
	##################- Left Menu -#####################
	Standards:
	- Starts with lm_;
	*/
	$lang['lm_general'] = "General";
		$lang['lm_homepage'] = "Homepage";
		$lang['lm_downloads'] = "Downloads";
		$lang['lm_staff'] = "Staff";
		$lang['lm_archive'] = "News Archive";
		$lang['lm_myacc'] = "My Account";
	$lang['lm_library'] = "Library";
		$lang['lm_items'] = "Items";
		$lang['lm_creatures'] = "Creatures";
		$lang['lm_exp_table'] = "Experience Table";
	$lang['lm_community'] = "Community";
		$lang['lm_screenshots'] = "Screenshots";
		$lang['lm_highscores'] = "Highscores";
		$lang['lm_interviews'] = "Interviews";
	
	/*
	#################- Right Menu -#####################
	Standards:
	- Starts with rm_;
	*/
	$lang['rm_calculator'] = "Calculator";
	$lang['rm_current_exp'] = "Current Exp";
	$lang['rm_wanted_lvl'] = "Wanted Level";
	$lang['rm_calculate'] = "Calculate";
	$lang['rm_links'] = "Links";
	$lang['rm_ads'] = "Ads";

	/*
	###################- Middle -#####################
	Standards:
	- Starts with mdl_;
	- This vars are for all the middle pages;
	*/
	// Indicates the place
	$lang['mdl_general'] = "General";
		$lang['mdl_homepage'] = "Homepage";
		$lang['mdl_archive'] = "Archive";
		$lang['mdl_downloads'] = "Downloads";
		$lang['mdl_staff'] = "Staff";
	$lang['mdl_account'] = "Account";
		$lang['mdl_account_home'] = "Home";
		$lang['mdl_account_login'] = "Login";
		$lang['mdl_account_new'] = "New Account";
		$lang['mdl_zezenia'] = "Zezenia";
		$lang['mdl_account_card'] = "Cards";
	$lang['mdl_news_archive'] = "News Archive";
	$lang['mdl_library'] = "Library";
		$lang['mdl_creatures'] = "Creatures";
		$lang['mdl_items'] = "Items";
			$lang['mdl_amulets'] = "Amulets";
			$lang['mdl_armors'] = "Armors";
			$lang['mdl_boots'] = "Boots";
			$lang['mdl_bracers'] = "Bracers";
			$lang['mdl_distance'] = "Distance";
			$lang['mdl_gauntlets'] = "Gauntlets";
			$lang['mdl_helmets'] = "Helmets";
			$lang['mdl_legs'] = "Legs";
			$lang['mdl_rings'] = "Rings";
			$lang['mdl_shields'] = "Shields";
			$lang['mdl_wands'] = "Wands";
			$lang['mdl_weapons'] = "Weapons";
			$lang['mdl_foods'] = "Foods";
	$lang['lm_spell_list'] = "Spell List";
		$lang['mdl_exp_table'] = "Experience Table";
			$lang['mdl_exp_level'] = "Level";
			$lang['mdl_exp_exp'] = "Experience points";
			$lang['mdl_exp_tnl'] = "To Next Level";
	$lang['mdl_community'] = "Community";
		$lang['mdl_screenshots'] = "Screenshots";
		$lang['mdl_highscores'] = "Highscores";
		$lang['mdl_interviews'] = "Interviews";
	// Indicates the description of the place
	$lang['mdl_home'] = "Home";
	$lang['mdl_account_welcome'] = "My Account";
	$lang['mdl_login_user'] = "Username";
		$lang['mdl_login_pass'] = "Password";
		$lang['mdl_login_confirm_pass'] = "Confirm Password";
		$lang['mdl_login_email'] = "E-mail";
		$lang['mdl_login_confirm_email'] = "Confirm E-mail";
		$lang['mdl_login_captcha_desc'] = "The text isn't case-sensitive";
		$lang['mdl_login_new'] = "Don't have an account yet?";
		$lang['mdl_login_new_link'] = "Create one now!";
	$lang['mdl_staff_list'] = "Staff List";
		$lang['mdl_staff_admins'] = "Administrators";
		$lang['mdl_staff_translators'] = "Translators";
		$lang['mdl_staff_zezenia'] = "Zezenia Staff";
	$lang['mdl_items_list'] = "Items List";
		$lang['mdl_amulets_list'] = "Amulets List";
		$lang['mdl_armors_list'] = "Armors List";
		$lang['mdl_boots_list'] = "Boots List";
		$lang['mdl_bracers_list'] = "Bracers List";
		$lang['mdl_distance_list'] = "Distance List";
		$lang['mdl_gauntlets_list'] = "Gauntlets List";
		$lang['mdl_helmets_list'] = "Helmets List";
		$lang['mdl_legs_list'] = "Legs List";
		$lang['mdl_rings_list'] = "Rings List";
		$lang['mdl_shields_list'] = "Shields List";
		$lang['mdl_wands_list'] = "Wands List";
		$lang['mdl_weapons_list'] = "Weapons List";
	$lang['mdl_creatures_list'] = "Creatures List";
	$lang['mdl_spell_list'] = "Spell List";
		$lang['mdl_spell_suport'] = "Defensive Spells";
		$lang['mdl_spell_misc'] = "Miscellaneous Spells";
		$lang['mdl_spell_attack'] = "Offensive Spells";
	$lang['mdl_highscore_main'] = "Highscores";
		$lang['mdl_highscore_rank'] = "Rank";
		$lang['mdl_highscore_name'] = "Name";
		$lang['mdl_highscore_level'] = "Level";
		$lang['mdl_highscore_exp'] = "Experience";
		$lang['mdl_highscore_class'] = "Class";
		$lang['mdl_highscore_variation'] = "Variation";
		$lang['mdl_highscore_statiscs_for'] = "Statistics for";

	// Lists vars
	$lang['mdl_list_name'] = "Name";
	$lang['mdl_list_attack'] = "Attack";
	$lang['mdl_list_defence'] = "Defence";
	$lang['mdl_list_distance'] = "Distance";
	$lang['mdl_list_magic'] = "Magic";
	$lang['mdl_list_dropped_by'] = "Dropped By";
	$lang['mdl_list_heal'] = "Recover";


?>