## Joomla 2.5 Mod for AnythingSlider by Ken Adam

* The original [Joomla 1.5 mod for AnythingSlider](http://extensions.joomla.org/extensions/news-display/articles-display/articles-showcase/11799) (version 1.2.1) was written by [Dnote software](http://www.dnote.nl/index.php?option=com_content&view=article&id=40&Itemid=33) with a GPLv2 license.
* This repository was started by updates made by [Ken Adam](https://github.com/Akadamia) for Joomla 2.5 and AnythingSlider v1.7.26.
* Updated by [Ken Adam](https://github.com/Akadamia) Feb 2013 to use AnythingSlider 1.8.16 
* These files were sent me to post on github. I (Mottie) have very little knowledge of php and Joomla, but I will do my best to keep this repository updated.
* This code package is also available for download from [joomlacode.org](http://joomlacode.org/gf/project/anythingslider/)
* AnythingSlider documentation can be found [here](https://github.com/CSS-Tricks/AnythingSlider/wiki).

## To do

* Add installation instructions.

## Change Log

### Version 1.4.2b (30/03/2013)

* Updates for Joomla 3 compatibility
* Replaced DS with '/'
* Replaced toMySQL with toSQL

### Version 1.4.1 (09/02/2013)

* Corrected call for "content.prepare" to Joomla! 2.5 version so that the content of each slide gets processed by the installed content prepare plugins

### Version 1.4.0 (2/06/2013)

* Updated to use version 1.8.16 of AnythingSlider
* Corrected setting of #aswrapper id so that "expand" mode works

### Version 1.3.2 (3/18/2012)

* Added XML install file.
* Removed Joomla "sections" from the previous mod as they are no longer used.
* The wrapper ID is “aswrapper”, as “wrapper” is commonly used in Joomla templates and so would not be unique.
* Increased the specificity in all the CSS files to prefix all the div rules with #aswrapper, as too many template rules were affecting the styling of the slider (e.g. applying background colours to the arrows and navigation tabs on hover or active).
* A pale wood graphic was created and added another wrapper option to use it.
* Working on getting Joomla Extensions Database (JED) to add a new version of this original mod rather than fork the previous version.
