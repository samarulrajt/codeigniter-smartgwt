<?php echo "//Create by GWT Igniter Engine\n\n" ?>

import com.google.gwt.core.client.JavaScriptObject;

public class <?=ucwords($object_name)?>JSO extends JavaScriptObject {

	protected <?=ucwords($object_name)?>JSO() {
		// TODO Auto-generated constructor stub
	}

	public static <?=ucwords($object_name)?>JSO create<?=ucwords($object_name)?>JSO()
	{
		<?=ucwords($object_name)?>JSO objectJSO = (<?=ucwords($object_name)?>JSO) <?=ucwords($object_name)?>JSO.createObject();		
		return objectJSO;
	}

	public final String toJSON() {          
        return new JSONObject(this).toString();
	}

	public final <?=ucwords($object_name)?>JSO fromJSON(String json) {
		JavaScriptObject object = JSONParser.parse(json).isObject();
		if(object != null){
			<?=ucwords($object_name)?>JSO objectJSO = (<?=ucwords($object_name)?>JSO)object.getJavaScriptObject();
			return objectJSO;
		}
		return null;        
	}	
	
	<?php foreach($fields as $field):?>	
	public final native <?=$field->type?> get<?=ucwords($field->name)?>() /*-{
		return this.<?=$field->name?>;
	}-*/;

	public final native void set<?=ucwords($field->name)?>(<?=$field->type?> data) /*-{
		this.<?=$field->name?> = data;
	}-*/;	
	<?php endforeach;?>

}
