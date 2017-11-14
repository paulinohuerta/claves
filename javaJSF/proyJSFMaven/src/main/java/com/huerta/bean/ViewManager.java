package com.huerta.bean;
import com.huerta.model.Elemento;
import java.io.Serializable;
import java.util.Map;
import java.util.ArrayList;
import java.util.List;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import redis.clients.jedis.Jedis;

@ManagedBean(name="obj")
@ViewScoped
public class ViewManager implements Serializable{
  private String key;
  private String value;
  private String last;
  private boolean good;
  private List<Elemento> listClaves;
  public ViewManager() {
     good=false;
  }
  public String getLast() {
    return last;
  }
  public List<Elemento> getListClaves() {
    listClaves = new ArrayList<Elemento>();
    Jedis jedis = new Jedis();
    Map<String,String> hash_tarea2 = jedis.hgetAll("nombres1H");
    for(Map.Entry<String,String> entry : hash_tarea2.entrySet()) {
      listClaves.add(new Elemento(entry.getKey(),entry.getValue()));
    }
    return listClaves;
  }
  public String getKey() {
    return key;
  }

  public void setKey(String key) {
    this.key = key;
  }
  public boolean isGood() {
    return good;
  }
  public String getValue() {
    return value;
  }

  public void setLast(String last) {
    this.last = last;
  }

  public void setValue(String value) {
    this.value = value;
  }
  
  public String add() {
    System.out.println("=" + this.key + "=" + this.value + "=");
    Jedis conn = new Jedis();
    if(!(conn.sismember("nombres1",this.key))) {
      this.last=this.key;
      this.good=true;
      conn.sadd("nombres1",this.key);
      conn.hset("nombres1H",this.key,this.value);
    }
    else {
      this.good=false;
    }
    this.setKey("");
    this.setValue("");
    return null;
  }
}
