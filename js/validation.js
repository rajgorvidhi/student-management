$(document).ready(function()
{
	$("#form").validate(
	{
		rules:{
			'name':{
				required: true,
				minlength: 1
			},
			'standard': {
				required: true,
			},
			'email': {
				required: true,
				email: true
			},
			'mobile_no': {
				required: true,
				max: 10
			},
			'dob':{
				required: true,
				date: true
			},
			'gender': {
				required: true,
			}
		},
			messages: {
				'name': {
					required: "The name is required!",
					minlength: "Choose atleast 1 letter"
				},
				'standard': {
					required: "The standard is required",
				},
				'email': {
					required: "The Email is required",
					email: "Please enter a valid email address!"
				},
				'mobile_no': {
					required: "The Phone no is required",
					max: "Please enter 10 digit"
				},
				'dob': {
					required: "The Birthdate is required",
					date: "Please enter a valid date"
				},
				'gender': {
					required: "The gender is required",
				}

			}
	});

});

