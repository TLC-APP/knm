##ExcelReader
This CakePHP 2.x plugin is to read .xls files in the Excel 97/2003 format.

Actually it is a direct port of PHPExcelReader created by **Vadim Tkachenko** <vt@apachephp.com>, enhanced and maintained by **Matt Kruse** <http://mattkruse.com>.

Maintained at http://code.google.com/p/php-excel-reader/

Made some minor changes to optimize it a bit for CakePHP use.

## Installation

### Clone

Clone from github: in your plugin directory type 

	git clone https://github.com/xzazx/ExcelReader.git ExcelReader

### Submodule

Add as Git submodule: in your plugin directory type 

	git submodule add https://github.com/xzazx/ExcelReader.git ExcelReader

### Manual

Download as archive from github and extract to app/plugins/ExcelReader

### Loading

Load as Plugin in any Controller

	CakePlugin::load('ExcelReader');
	
Usable as a component
	
	public $components = array(
		'ExcelReader.ExcelReader'
	);
	
## Example of usage

	public function admin_importxls() {
		// Read Excel file. NOTE: only relative paths seem to work
		$read = $this->ExcelReader->Spreadsheet_Excel_Reader("files/test.xls");
		if(false === $read) {
			$this->Session->setFlash("No readable file chosen!","default",array("class" => "alert alert-error"));
			return false;
		}
		
		// Print all cells from sheet 0
		pr($this->ExcelReader->sheets[0]['cells']);
		
	}
