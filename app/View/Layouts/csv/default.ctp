<?php 

	/**
	* Solução para encondig no Excel
	* 		
	* http://www.daniweb.com/web-development/php/threads/71956/porblem-in-utf-8-support-on-csvexcel
	* 
	* Hi Guys,
	* 
	* It seems like everyone is having this issue. This is very common problem and i have been looking for its solution for a long time too. I have't tried the mb_... function and i am not sure if this will help for all languages but here is something i have found and have tested it to make sure it works for almost all languages.
	* 
	* This is problem with Excel NOT the data format that is exported. Here are the steps
	* 
	* 1- download the exported CSV/XLS file from your website.
	* 2- Open Excel 2007
	* 3- Open a new file
	* 4- Click the Data Menu option
	* 5- Click "From Text" button
	* 6- Select the file you downloaded
	* 7- Make sure "Delimited" is selected and Press Next
	* 8- Check the delimiter characters that you know are in your file like Comma or Tab or whatever is in your case. You can select more than one
	* 9- Proceed to Next Step and Finich
	* 10- Your excel file will be ready with all you data displayed correctly
	* 
	* I hope that helps someone who has been frustrated on this.
	* 
	* Regards
	* Nauman
	*/

    // File: /app/views/layouts/csv/default.ctp 

    // Echo the view's output as we would on any normal web page   

    echo $content_for_layout; 

?>
