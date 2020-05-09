<template>
<div class="home-content router-content">
	<div style="position: fixed; top: 12px; right: 20px; cursor: pointer; font-size: 30px;">✕</div>
	
		<h2>Cease and desist letter generator</h2>
		
		If someone is using your design without your permission, use a cease and desist letter to make a formal request for them to stop ("cease") and not continue ("desist") 
		this behavior. Generate a cease and desist letter and send it to the person or company infringing your intellectual property rights. Attach your original design 
		and screenshots showing where/how the infringer is using it without your permission.
		<br><br>
		After receiving this letter, if the infringing person or company does not cease and desist, then you should contact the authorities who can take action  
		against the infringer. For example, if your design is being used on a website, then send the letter to the hosting provider of that website. If your design is being 
		used on YouTube, Facebook or any other social media site, then contact the support for that site, or fill out the copyright infringement form.
		<br><br>
		The same cease and desist letter can be printed and sent to a physical address, preferably as a certified letter.
		
		<br><br>
		
		<span style="font-size:12px;">
		DISCLAIMER: THIS CEASE AND DESIST LETTER IS A GENERAL TEMPLATE THAT MIGHT NOT FIT YOUR INDIVIDUAL NEEDS. THE PROVIDED INFORMATION HERE AND THE CEASE AND DESIST LETTER 
		TEMPLATE DOES NOT CONSTITUTE LEGAL ADVICE. USING THIS INFORMATION DOES NOT CREATE AN ATTORNEY-CLIENT RELATIONSHIP BETWEEN YOU AND SET IN BLOCK. IF YOU WISH TO RECEIVE LEGAL ADVICE, YOU SHOULD HIRE AN ATTORNEY WHO IS ABLE TO ASSISIST WITH YOUR SPECIFIC SITUATION. THE ATTORNEY WILL TAILOR HIS/HER ADVICE TO YOUR SPECIFIC NEEDS.
		</span>

		<br><br><br><b>Provide details for your cease and desist letter:</b><br><br><div style="line-height: 30px; margin-bottom: 5px;">
			Your country:  <input v-model="letterCountry" type="text" style="border: 1px solid rgb(170, 170, 170);"><br>
			Date you intend to send this letter:  <input v-model="letterDate" type="text" style="border: 1px solid rgb(170, 170, 170);"><br>
			Infringer's name:  <input v-model="letterInfrName" type="text" style="border: 1px solid rgb(170, 170, 170);"><br>
			Your name:  <input v-model="letterYourName" type="text" style="border: 1px solid rgb(170, 170, 170);"><br>
			Type of your design:  <input v-model="letterDesignType" type="text" style="border: 1px solid rgb(170, 170, 170);"><br>
			Name of your design:  <input v-model="letterDesignName" type="text" style="border: 1px solid rgb(170, 170, 170);"></div>
			
			<button @click="generate()" id="cease-desist-button">Generate</button>
			
			<div style="height:20px;"></div>

			<div id="ceaseselectall" onclick="selectText('ceaseselectall')" style="border: 1px solid grey; background-color: rgb(224, 224, 224); border-radius: 3px; padding: 5px 15px 30px; margin: 30px 0px 0px;">

			<div v-if="!isLetter">
				<div style="height:25px;"></div>
				Your cease and desist letter will appear in this window.
			</div>

			<div v-if="isLetter">
				<h4>CEASE AND DESIST DEMAND</h4><br>
				In accordance with the copyright law of {{ letterCountry }} and International Copyright Standards
				<br><br>
				{{ letterDate }}
				<br><br>
				Dear {{ letterInfrName }}:
				<br><br>
				This communication details a cease and desist notice by {{ letterYourName }}. If you are represented by legal counsel, please direct this letter to 
				your attorney immediately and have your attorney notify me of such representation. I am writing to notify you that your unlawful copying of my {{ letterDesignType }}: 
				'{{ letterDesignName }}' infringes upon my exclusive copyrights. Accordingly, you are hereby directed to
				<br><br>
				CEASE AND DESIST ALL COPYRIGHT INFRINGEMENT.
				<br><br>
				I am the owner of a copyright in various aspects of {{letterDesignName}}. Under {{letterCountry}} copyright law, my copyrights have been in effect since the date that {{letterDesignName}} was created. All copyrightable aspects of {{letterDesignName}} are copyrighted under {{letterCountry}} copyright law.
				<br><br>
				It has come to my attention that you have been copying {{letterDesignName}}. I have copies of your unlawful copies to preserve as evidence. Your actions constitute 
				copyright infringement in violation of {{letterCountry}}'s copyright laws. The consequences of copyright infringement can include statutory damages greater than $1000 
				per work, and damages greater than $10,000 per work for willful infringement. If you continue to engage in copyright infringement after receiving this letter, your 
				actions will be evidence of "willful infringement." Based upon the foregoing, I demand that you immediately (i) cease and desist your unlawful duplication of 
				{{letterDesignName}} and (ii) promptly communicate your assurance within ten (10) days that you will cease and desist from further infringement of my copyrighted works.
				<br><br>
				If you do not comply with this cease and desist demand within this time period, I am entitled to use your failure to comply as evidence of "willful infringement" 
				and seek monetary damages and equitable relief for your copyright infringement. In the event you fail to meet this demand, please be advised that I will contemplate 
				pursuing all available legal remedies, including seeking monetary damages, injunctive relief, and an order that you pay court costs and attorney's fees. Your 
				liability and exposure under such legal action could be considerable.
				<br><br>
				Before taking these steps, however, I wish to give you one opportunity to discontinue your illegal conduct by complying with this demand within ten (10) days. 
				Accordingly, please reply to this email within ten (10) days with your acceptance of the attached Agreement.
				<br><br>
				The foregoing is without waiver of any and all rights of myself, all of which are expressly reserved herein. If you or your attorney have any questions, please 
				contact me directly.
				<br><br>
				Sincerely,
				<br><br>
				{{letterYourName}}
				<br><br><br><br>
				################# Attachment: #################
				<br><br><br><br>
				Copyright Infringement Settlement Agreement
				<br><br>
				I, _______________________________, agree to immediately cease and desist copying {{letterDesignName}} in exchange for {{letterYourName}} releasing any and all claims against me for 
				copyright infringement. In the event this agreement is breached by me, {{letterYourName}} will be entitled to costs and attorney's fees in any action brought to enforce 
				this agreement and shall be free to pursue all rights that {{letterYourName}} had as of the date of this letter as if this letter had never been signed.
				<br><br>
				Signed:________________________________
				<br><br>
				Dated:________________________________
			</div>
		</div>

		<div style="height:40px;"></div>
	</div>
</template>

<script>
export default {
	data: function() {
		return {
			isLetter: false,
			letterCountry: '',
			letterDate: '',
			letterInfrName: '',
			letterYourName: '',
			letterDesignType: '',
			letterDesignName: '',
		}
	},
	methods: {
		generate: function() {
			this.isLetter = true;
		}
	}
}
</script>

<style scoped>
	input[type=text] {
		padding-left: 4px;
		height: 26px;
		width: 200px!important;
		margin: 4px;
	}
</style>