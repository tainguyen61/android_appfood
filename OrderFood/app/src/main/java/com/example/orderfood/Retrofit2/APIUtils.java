package com.example.orderfood.Retrofit2;

public class APIUtils {
    public static final String BaseUrl = "http://apporderfood1121.000webhostapp.com/server/";

    public static DataClient getData(){
        return RetrofitClient.getClient(BaseUrl).create(DataClient.class);
    }
}
