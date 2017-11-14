package com.huerta.model;
public class Elemento {
  private String key;
  private String value;
  public Elemento(String k, String v) {
     key=k;
     value=v;
  }
  public Elemento() {
  }

  public String getValue() {
     return value;
  }
  public String getKey() {
     return key;
  }
  public void setKey(String p) {
     key=p;
  }
  public void setValue(String n) {
     value=n;
  }
  @Override
  public boolean equals(Object o) {
    if(!(o instanceof Elemento)) return false;
    Elemento other = (Elemento) o;
    return (this.key.equals(other.key) && this.value.equals(other.value));
  }
}

