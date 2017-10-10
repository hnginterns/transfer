@extends('layouts.page')
@section('main-text', 'Contact Us')
@section('sub-text', 'TransferRules lets you receive payments locally and globally with no hassles and zero set up fees')
@section('content')

<div class="container">
				
		<form action="/action_page.php">

			<label for="fname">First Name</label>
			<input type="text" id="fname" name="firstname" placeholder="Your name..">

			<label for="lname">Last Name</label>
			<input type="text" id="lname" name="lastname" placeholder="Your last name..">

			<label for="Email">Email</label>
			<input type="text" id="email" name="lastname" placeholder="Your Email">
			
			<label for="country">Country</label>
			<select id="country" name="country">
			  <option value="australia">Nigeria</option>
			  <option value="canada">Ghana</option>
			  <option value="Kenya">Kenya</option>
			  <option value="South Africa">South Africa</option>
			  <option value="Germany">Germany</option>
			  <option value="Togo">Togo</option>
			</select>

			
			<label for="subject">Subject</label>
			<textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

			<input type="submit" value="Submit">

		</form>
  
	</div>
            
</body> 


		.container {
			width: 50%;
		            margin: auto;
			}
									
									
 /* Style inputs with type="text", select elements and textareas */
                                    input[type=text], select, textarea {
                                        width: 100%; 
                                        padding: 12px; 
                                        border: 1px solid #ff6347; 
                                        border-radius: 4px; 
                                        box-sizing: border-box; 
                                        margin-top: 6px; 
                                        margin-bottom: 16px; 
                                        resize: vertical;
										display: block;
                                    }

                                    /* Style the submit button with a specific background color etc */
                                    input[type=submit] {
                                        background-color: #4CAF50;
                                        color: white;
                                        padding: 12px 20px;
                                        border: none;
                                        border-radius: 4px;
                                        cursor: pointer;
										margin-left:
                                    }

                                    /* When moving the mouse over the submit button, add a darker green color */
                                    input[type=submit]:hover {
                                        background-color: #45a049;
                                    }

                                    /* Add a background color and some padding around the form */
                                    .container {
                                        border-radius: 5px;
                                        background-color: #f2f2f2;
                                        padding: 20px;
                                    }

</style>


@endsection
