<template>
<div class="app-component-modal">
		
		<div style="position:fixed;top:12px;right:20px;cursor:pointer;font-size:30px;" v-on:click="cease">&#10005;</div>
		<p><h3>Cease and desist letter generator</h3></p>
		
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
		TEMPLATE DOES NOT CONSTITUTE LEGAL ADVICE. USING THIS INFORMATION DOES NOT CREATE AN ATTORNEY-CLIENT RELATIONSHIP BETWEEN YOU AND PROTECTED.DESIGN. IN THE FUTURE, 
		PROTECTED.DESIGN WILL WORK WITH AN IP LAW FIRM AND EXPAND THIS SECTION, BUT FOR NOW, IF YOU WISH TO RECEIVE LEGAL ADVICE, YOU SHOULD HIRE AN ATTORNEY WHO IS 
		ABLE TO ASSISIST WITH YOUR SPECIFIC SITUATION. USING THE PROOF OF DESIGN OWNERSHIP CREATED WITH PROTECTED.DESIGN, THE ATTORNEY WILL TAILOR HIS/HER ADVICE TO YOUR SPECIFIC NEEDS.
		</span>
		<br><br><br>
		<b>Provide details for your cease and desist letter:</b><br><br>
		<div style="line-height:30px;margin-bottom:5px;">
			Your country:  <input style="border: 1px solid #aaa;" v-model="txt_country"><br>
			Date you intend to send this letter:  <input style="border: 1px solid #aaa;" v-model="txt_date"><br>
			Infringer's name:  <input style="border: 1px solid #aaa;" v-model="txt_name"><br>
			Your name:  <input style="border: 1px solid #aaa;" v-model="txt_ownersname"><br>
			Type of your design:  <input style="border: 1px solid #aaa;" v-model="txt_designtype"><br>
			Name of your design:  <input style="border: 1px solid #aaa;" v-model="txt_designname">
		</div>
		<button id="cease-desist-button" v-on:click="state_letter_generated = true">Generate</button>
		<div id="ceaseselectall" v-show="state_letter_generated" onclick="selectText('ceaseselectall')" 
		style="border:1px solid grey;background-color:#e0e0e0;border-radius:3px;padding:5px 15px 30px 15px;margin:30px 0px 0px 0px;">
			<h4>CEASE AND DESIST DEMAND</h4>
			<br>
			In accordance with the copyright law of {{ txt_country }} and International Copyright Standards
			<br>
			<br>
			{{ txt_date }}
			<br>
			<br>
			Dear {{ txt_name }}:
			<br>
			<br>
			This communication details a cease and desist notice by {{ txt_ownersname }}. If you are represented by legal counsel, please direct this letter to 
			your attorney immediately and have your attorney notify me of such representation. I am writing to notify you that your unlawful copying of my {{ txt_designtype }}: 
			'{{ txt_designname }}' infringes upon my exclusive copyrights. Accordingly, you are hereby directed to
			<br>
			<br>
			CEASE AND DESIST ALL COPYRIGHT INFRINGEMENT.
			<br>
			<br>
			I am the owner of a copyright in various aspects of {{ txt_designname }}. Under {{ txt_country }} copyright law, my copyrights have been in effect since the date 
			that {{ txt_designname }} was created. All copyrightable aspects of {{ txt_designname }} are copyrighted under {{ txt_country }} copyright law.
			<br>
			<br>
			It has come to my attention that you have been copying {{ txt_designname }}. I have copies of your unlawful copies to preserve as evidence. Your actions constitute 
			copyright infringement in violation of {{ txt_country }}'s copyright laws. The consequences of copyright infringement can include statutory damages greater than $1000 
			per work, and damages greater than $10,000 per work for willful infringement. If you continue to engage in copyright infringement after receiving this letter, your 
			actions will be evidence of "willful infringement." Based upon the foregoing, I demand that you immediately (i) cease and desist your unlawful duplication of 
			{{ txt_designname }} and (ii) promptly communicate your assurance within ten (10) days that you will cease and desist from further infringement of my copyrighted works.
			<br>
			<br>
			If you do not comply with this cease and desist demand within this time period, I am entitled to use your failure to comply as evidence of "willful infringement" 
			and seek monetary damages and equitable relief for your copyright infringement. In the event you fail to meet this demand, please be advised that I will contemplate 
			pursuing all available legal remedies, including seeking monetary damages, injunctive relief, and an order that you pay court costs and attorney's fees. Your 
			liability and exposure under such legal action could be considerable.
			<br>
			<br>
			Before taking these steps, however, I wish to give you one opportunity to discontinue your illegal conduct by complying with this demand within ten (10) days. 
			Accordingly, please reply to this email within ten (10) days with your acceptance of the attached Agreement.
			<br>
			<br>
			The foregoing is without waiver of any and all rights of myself, all of which are expressly reserved herein. If you or your attorney have any questions, please 
			contact me directly.
			<br>
			<br>
			Sincerely,
			<br>
			<br>
			{{ txt_ownersname }}
			<br>
			<br>
			<br>
			<br>
			################# Attachment: #################
			<br>
			<br>
			<br>
			<br>
			Copyright Infringement Settlement Agreement
			<br>
			<br>
			I, ___________________, agree to immediately cease and desist copying {{ txt_designname }} in exchange for {{ txt_ownersname }} releasing any and all claims against me for 
			copyright infringement. In the event this agreement is breached by me, {{ txt_ownersname }} will be entitled to costs and attorney's fees in any action brought to enforce 
			this agreement and shall be free to pursue all rights that {{ txt_ownersname }} had as of the date of this letter as if this letter had never been signed.
			<br>
			<br>
			Signed:________________________________
			<br>
			<br>
			Dated:________________________________


		</div>

	<p style="margin-top: 40px;"><span v-on:click="cease" class="yellow_link">Close</span></p>
	
	</div>
</template>