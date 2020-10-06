/* Function for Toggling Upper Menu */
function menu_toggle (ele,butt) {
	
	ele = document.querySelector(ele);
	
	butt = butt.children[0];
	
	if(ele.style.left == '0%') {
		
		//Close The Menu.
		ele.style.left = 100 + '%';
		
		//Change The Button Icon To Normal.
		butt.className = "dashicons dashicons-menu-alt3";
		
	}else {
		
		//Open The Menu
		ele.style.left = 0 + '%';
		
		//Change The button Icon To Close Icon.
		butt.className = 'dashicons dashicons-dismiss';
		
	}
	
}

//Adjusting Social Media Links.
function social_media_links () {
	
	//Find All Social Media Links In The Page.
	let social_butts = document.querySelectorAll("#social-links,#menu-social-media");
	
	//Loop Inside Them.
	for(let i = 0,n = social_butts.length;i < n;i++) {
		
		let social_butt_parent = social_butts[i].children;
		
		//Loop InEach Child.
		for(let ii = 0,nn = social_butt_parent.length;ii < nn;ii++) {
			
			//Check The Name Writen On It.
			let social_network_name = social_butt_parent[ii].children[0].innerHTML;
			
			//Turn It To Small Words.
			social_network_name = social_network_name.toLowerCase();
			
			let icon_name = "";
			
			switch(social_network_name) {
				
				//Facebook
				case "facebook":
				case "fb":
				
					icon_name = "facebook-alt";
				
				break;
				
				//Twiiter.
				case "twitter":
				case "tw":
				
					icon_name = "twitter";
				
				break;
				
				//Instagram.
				case "instagram":
				case "insta":
				
					icon_name = "instagram";
				
				break;
				
				//Email.
				case "email":
				case "mail":
				
					icon_name = "email";
				
				break;
				
				//Google Mail.
				case "gmail":
				case "google mail":
				case "gm":
				
					icon_name = 'google';
				
				break;
				
				//If Not From Above Try Automatic Solution ( Doesn't Work Everytime ).
				default:
				
					icon_name = social_network_name;
				
				break;
				
			}
		
			//Change The Inner Child Element.
			social_butt_parent[ii].children[0].outerHTML = "<i class = 'dashicons dashicons-" + icon_name + "'></i>";
		
		}
		
	}
	
}

//On Page Load Actions.
window.onload = function () {
	
	//Once Page Load Trigger These Functions.
	social_media_links();
	
};