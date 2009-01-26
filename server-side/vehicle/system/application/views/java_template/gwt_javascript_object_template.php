
import com.google.gwt.core.client.JavaScriptObject;

public class {object_name}JSO extends JavaScriptObject {

	protected {object_name}JSO() {
		// TODO Auto-generated constructor stub
	}

	public static {object_name}JSO create{object_name}JSO()
	{
		{object_name}JSO objectJSO = ({object_name}JSO) EquipmentJSO.createObject();
		
		return objectJSO;
	}
	
	{fields}
	public final native {field_type} get{field_name}() /*-{
		return this.{field_name};
	}-*/;

	public final native void set{field_name}({field_type} data) /*-{
		this.{field_name} = data;
	}-*/;
	{/fields}

}


