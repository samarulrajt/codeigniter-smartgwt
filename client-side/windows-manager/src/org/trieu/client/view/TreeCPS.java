package org.trieu.client.view;

import org.gwm.client.GDesktopPane;
import org.gwm.client.GInternalFrame;
import org.gwm.client.impl.DefaultGInternalFrame;

import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.ScrollPanel;
import com.google.gwt.user.client.ui.Tree;
import com.google.gwt.user.client.ui.TreeItem;
import com.google.gwt.user.client.ui.TreeListener;

public class TreeCPS extends Composite {
	private GDesktopPane desktop;
	public static String ROOT_CONTROLLER = "http://localhost/vehicle/index.php/";

	public GDesktopPane getDesktop() {
		return desktop;
	}

	public void setDesktop(GDesktopPane desktop) {
		if (desktop != null) {
			this.desktop = desktop;
		}
	}

	private final Tree tree;
	public TreeCPS() {
		final ScrollPanel scrollPanel = new ScrollPanel();
		initWidget(scrollPanel);

		tree = new Tree();

		tree.setSelectedItem(null);
		tree.setSize("100%", "100%");
		scrollPanel.setWidget(tree);

		final TreeItem treeItem = new TreeItem("Quản lý nghiệp vụ");
		tree.addItem(treeItem);
		treeItem.addItem(treeItemXe);

		final TreeItem treeItem_1 = new TreeItem("New item");
		tree.addItem(treeItem_1);

		final TreeItem treeItem_2 = new TreeItem("New item");
		treeItem_1.addItem(treeItem_2);

		tree.addTreeListener(new TreeListener() {
			public void onTreeItemSelected(final TreeItem item) {
				if(item == treeItemXe) {
					showXeWindow();
				}
			}
			public void onTreeItemStateChanged(final TreeItem item) {
			}
		});

		setSize("200px", "500px");
		setStyleName("gwt-Tree-cps");
	}

	//WINDOWS and tree item


    public void showBao_duong_xeWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quản lý Bao_duong_xe");
		win.setUrl(ROOT_CONTROLLER + "c_Bao_duong_xe");
		win.setSize(1024, 600);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
    final TreeItem treeItemBao_duong_xe = new TreeItem("Bao_duong_xe");


    public void showChi_nhanhWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quản lý Chi_nhanh");
		win.setUrl(ROOT_CONTROLLER + "c_Chi_nhanh");
		win.setSize(1024, 600);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
    final TreeItem treeItemChi_nhanh = new TreeItem("Chi_nhanh");


    public void showDieu_khoan_hop_dongWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quản lý Dieu_khoan_hop_dong");
		win.setUrl(ROOT_CONTROLLER + "c_Dieu_khoan_hop_dong");
		win.setSize(1024, 600);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
    final TreeItem treeItemDieu_khoan_hop_dong = new TreeItem("Dieu_khoan_hop_dong");


    public void showGps_markersWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quản lý Gps_markers");
		win.setUrl(ROOT_CONTROLLER + "c_Gps_markers");
		win.setSize(1024, 600);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
    final TreeItem treeItemGps_markers = new TreeItem("Gps_markers");


    public void showHop_dong_thue_xeWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quản lý Hop_dong_thue_xe");
		win.setUrl(ROOT_CONTROLLER + "c_Hop_dong_thue_xe");
		win.setSize(1024, 600);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
    final TreeItem treeItemHop_dong_thue_xe = new TreeItem("Hop_dong_thue_xe");


    public void showLich_su_cap_nhat_xeWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quản lý Lich_su_cap_nhat_xe");
		win.setUrl(ROOT_CONTROLLER + "c_Lich_su_cap_nhat_xe");
		win.setSize(1024, 600);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
    final TreeItem treeItemLich_su_cap_nhat_xe = new TreeItem("Lich_su_cap_nhat_xe");


    public void showModel_xeWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quản lý Model_xe");
		win.setUrl(ROOT_CONTROLLER + "c_Model_xe");
		win.setSize(1024, 600);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
    final TreeItem treeItemModel_xe = new TreeItem("Model_xe");


    public void showNhat_ki_hanh_trinhWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quản lý Nhat_ki_hanh_trinh");
		win.setUrl(ROOT_CONTROLLER + "c_Nhat_ki_hanh_trinh");
		win.setSize(1024, 600);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
    final TreeItem treeItemNhat_ki_hanh_trinh = new TreeItem("Nhat_ki_hanh_trinh");


    public void showThiet_biWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quản lý Thiet_bi");
		win.setUrl(ROOT_CONTROLLER + "c_Thiet_bi");
		win.setSize(1024, 600);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
    final TreeItem treeItemThiet_bi = new TreeItem("Thiet_bi");


    public void showXeWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quản lý Xe");
		win.setUrl(ROOT_CONTROLLER + "c_Xe");
		win.setSize(1024, 600);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
    final TreeItem treeItemXe = new TreeItem("Xe");

}
