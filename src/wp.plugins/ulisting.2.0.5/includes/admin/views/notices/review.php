<style>
	.ulisting-review-message {
		border-color: #8F9EB0 !important;
	}

	.ulisting-thanks-message {
		border-color: #76a928 !important;
		padding: 10px;
	}

	.ulisting-review-message p:last-child {
		margin-top: 0;
	}

	.ulisting-review-message p.submit a.button-primary{
		background: #17a2b8;
		border-color: #17a2b8 #17a2b8 #8F9EB0;
		box-shadow: 0 1px 0 #8F9EB0;
		color: #fff;
		text-decoration: none;
		text-shadow: 0 -1px 1px #17a2b8, 1px 0 1px #17a2b8, 0 1px 1px #17a2b8, -1px 0 1px #17a2b8;
	}

	#ulisting_thanks_message {
		display: none;
	}
</style>

<div id="ulisting_message" class="notice notice-info ulisting-review-message">
	<p>Hey! We are so happy you choose <strong>uListing</strong> plugin. If you enjoy using it, can we ask you to give it a <strong>5-star rating</strong>?
		Thank you for helping us out!</p>
	<p class="submit">
		<a href="https://wordpress.org/support/plugin/ulisting/reviews/?filter=5#new-post" class="add_review button-primary" target="_blank">OK, you deserve it</a>
		<a href="javascript:void(0);" class="skip_review button-secondary">Nope, maybe later</a>
		<a href="javascript:void(0);" class="did_review button-secondary">I already did</a>
	</p>
</div>
<div id="ulisting_thanks_message" class="notice notice-info ulisting-thanks-message">
	<p>Great! Thank you for your contribution. We really appreciate you being our customer, and helping us to build a better customer experience.</p>
</div>