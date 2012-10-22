## Joomla 2.5 Mod for AnythingSlider by Ken Adam

* The original [Joomla 1.5 mod for AnythingSlider](http://extensions.joomla.org/extensions/news-display/articles-display/articles-showcase/11799) (version 1.2.1) was written by [Dnote software](http://www.dnote.nl/index.php?option=com_content&view=article&id=40&Itemid=33) with a GPLv2 license.
* This repository was started by updates made by [Ken Adam](https://github.com/Akadamia) for Joomla 2.5 and AnythingSlider v1.7.26.
* These files were sent me to post on github. I (Mottie) have very little knowledge of php and Joomla, but I will do my best to keep this repository updated.
* This code package is also available for download from [joomlacode.org](http://joomlacode.org/gf/project/anythingslider/)
* AnythingSlider documentation can be found [here](https://github.com/ProLoser/AnythingSlider/wiki).

## To do

* Update AnythingSlider to the most recent version.
* Code to link "anythingslider-ie.css" was not added Ken needed to find out how to get Joomla to add conditional comments in the header. Which will not be necessary once we update the AnythingSlider to the most recent version.
* Add installation instructions.

## Change Log

### Version 1.3.2 (3/18/2012)

* Added XML install file.
* Removed Joomla "sections" from the previous mod as they are no longer used.
* The wrapper ID is “aswrapper”, as “wrapper” is commonly used in Joomla templates and so would not be unique.
* Increased the specificity in all the CSS files to prefix all the div rules with #aswrapper, as too many template rules were affecting the styling of the slider (e.g. applying background colours to the arrows and navigation tabs on hover or active).
* A pale wood graphic was created and added another wrapper option to use it.
* Working on getting Joomla Extensions Database (JED) to add a new version of this original mod rather than fork the previous version.
