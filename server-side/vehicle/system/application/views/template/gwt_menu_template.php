	public void Thesis<?=ucwords($object_name)?>Window(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly <?=ucwords($object_name)?>");
		win.setUrl("http://localhost/vehicle/index.php/<?=ucwords($object_name)?>_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
