<html>
	<body>
		<div id="page" style="border: 1px #3b709a solid; width: 530px; height: 537px; margin: 0 auto">
			<div id="header" style="background-color: #3b709a">
				<img src="https://ohome.easywebmobile.fr/img/logo.png">
			</div>

			<div id="content" style="padding: 55px;
    font-family: Trebuchet MS;">
    			<p style="margin:0 auto"> Bonjour,</p>
				Voici votre code d'acces:
				<p>Login: <b>{{ $login}}</b></p>
				<p>Mot de passe: <b>{{ $mdp}}</b></p>
			</div>

			<div id="footer" style="height: 152px;
    background-color: #0a0a0adb;
    padding: 18px 100px;
    color: white;
    font-family: Tahoma;">
				2018 Copright by
				 <a style="text-decoration: none; color: yellow" href="https://easywebmobile.fr"> 
				 	EasyWebMobile
				</a>
				<div style="width: 50px">
					<img src="{{asset('/img/imgewm/logoewm.png')}}" >
				</div>

			</div>
		</div>
	</body>
</html>