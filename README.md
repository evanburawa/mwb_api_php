
#  MWB API PHP Library



# About

This library allows you to access the Metabolic Workbench REST API to get data for your application.  I was inspired to write an this after seeing the excellent work done on the Python project mwbtab.  Its an excellent library and inspired me to create a PHP based API for retrieving data.  The next goal will be to develop out the IO class to convert between file formats (which is already possible thanks to the excellent work done by the creators of mwbtab).  Thanks for checking this out and feel free to provide any feedback, always happy to hear it!  Thanks!


# Additional Resources

Metabolomics Workbench API Docs
- https://www.metabolomicsworkbench.org/tools/MWRestAPIv1.0.pdf


# Example

Im currently working on getting some examples up in the examples folder, but for just a quick start check this out.

```
# Load the required libraries (currently there are 2)
require_once '../MWB.php';
require_once '../API.php';


# Created the required objects
$MWB = new MWB\MWB;
$API = new MWB\API;

# Pass the API object into the MWB instance 
$MWB->setAPI($API);

#  Lets set up some test data (NOTE:  these properties are based off of the ones present in the existing MWB API)
$context      = 'study';
$inputItem    = 'analysis_id';
$inputValue   = '1';    // In this case this will be the article number and will be formatted acording (as per the API docs)
$outputItem   = 'mwtab';
$outputFormat = 'json';


# Set the MWB object to use this data via the various set methods
$MWB->setContext($context);
$MWB->setInputItem($inputItem);
$MWB->setInputValue($inputValue);
$MWB->setOutputItem($outputItem);
$MWB->setOutputFormat($outputFormat);

#  Finally, lets call the API via the MWB instance and wala!
$results = $MWB->call();
```




Have fun! :-)







