<template>
  <div class="home-content">

    <!-- PHP MetaMask User Login - COPY PASTE this part from demo.html -->
    <div style="text-align:center;word-wrap:break-word;">
		<span style="font-size:19px;">
			<b>Passwordless User Authentication System</b>
		</span>
		<div style="height:5px;"></div>
		<span style="font-size:16px;">
			Sign-in with Ethereum using PHP, MetaMask, and MySQL/PostgreSQL
		</span>

		<div style="height:20px;"></div>

		<a href="https://github.com/giekaton/php-metamask-user-login" target="_blank" style="font-size:15px;">GitHub</a>

		<div style="height:60px;"></div>

		<div id="loggedOut" class="user-login-msg">
			Click the button to (sign up and) login!
		</div>
		<div id="needMetamask" style="display:none;color: rgb(255, 115, 0);" class="user-login-msg">
			To login, first install a Web3 wallet like the <a href="https://metamask.io/" style="color:#ff7300" target="_blank">MetaMask</a> browser extension or mobile app
		</div>
		<div id="needLogInToMetaMask" style="display:none;color: rgb(255, 115, 0);" class="user-login-msg">
			Log in to your wallet account first!
		</div>
		<div id="signTheMessage" style="display:none;" class="user-login-msg">
			Sign the message with your wallet to authenticate
		</div>
		<div id="loggedIn" style="display:none;" class="user-login-msg">
			Successful authentication for address:<br><span id="ethAddress"></span>
			<br><br>
			You can set a public name for this account:<br>
			<input type="text" placeholder="Public name" id="updatePublicName" onfocusout="setPublicName()" style="width:190px;">
		</div>
		<br>
		<button onclick="userLoginOut()" id="buttonText">Log in</button>
		<!-- <button id="buttonText">Log in</button> -->
		
		<div style="height:40px;"></div>
    </div>

    <Footer />
  </div>
</template>

<script>
import Footer from "../partials/Footer.vue";

export default {
  name: "EthLogin",
  components: {
    Footer,
  },
  data: function() {
    return {

    };
  },
  methods: {},
  mounted() {
    document.getElementById("splashScreen").style.display = "none";
    window.scrollTo(0, 0);

	// PHP MetaMask User Login
	let el = document.getElementsByClassName('web3modal-modal-lightbox')[0];
	el.style.display = 'block';
	document.getElementById('buttonText').addEventListener('click', userLoginOut());
  }
};
</script>
