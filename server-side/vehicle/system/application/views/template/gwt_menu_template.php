

    public void show<?=ucwords($object_name)?>Window(){
		GInternalFrame win = new DefaultGInternalFrame("Quản lý <?=ucwords($object_name)?>");
		win.setUrl(ROOT_CONTROLLER + "c_<?=ucwords($object_name)?>");
		win.setSize(1024, 600);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
    final TreeItem treeItem<?=ucwords($object_name)?> = new TreeItem("<?=ucwords($object_name)?>");
