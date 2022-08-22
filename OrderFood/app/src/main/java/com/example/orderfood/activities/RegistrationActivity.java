package com.example.orderfood.activities;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.CountDownTimer;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.orderfood.R;
import com.example.orderfood.Retrofit2.APIUtils;
import com.example.orderfood.Retrofit2.DataClient;
import com.example.orderfood.models.Server;
import com.google.firebase.FirebaseException;
import com.google.firebase.auth.PhoneAuthCredential;
import com.google.firebase.auth.PhoneAuthProvider;

import java.util.HashMap;
import java.util.Map;
import java.util.concurrent.TimeUnit;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class RegistrationActivity extends AppCompatActivity {

    Button reg;
    EditText name,phone,pass,address;
    TextView reg_login;
    ProgressBar progressBar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registration);

        progressBar = findViewById(R.id.progressbar);

        reg = findViewById(R.id.reg_btn);
        name = findViewById(R.id.reg_name);
        phone = findViewById(R.id.reg_phone);
        pass = findViewById(R.id.reg_pass);
        address = findViewById(R.id.reg_address);
        reg_login = findViewById(R.id.reg_login);

        reg_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(RegistrationActivity.this,LoginActivity.class);
                startActivity(intent);
            }
        });
        reg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                createUser();
            }
        });
    }

    private void createUser() {
        final String userName,userPhone,userPass,userAddress;
        userName = name.getText().toString().trim();
        userPhone = phone.getText().toString().trim();
        userPass = pass.getText().toString().trim();
        userAddress = address.getText().toString().trim();

        if (TextUtils.isEmpty(userName)){
            Toast.makeText(this, "Tên không được để trống!", Toast.LENGTH_SHORT).show();
            return;
        }
        if (TextUtils.isEmpty(userPhone)){
            Toast.makeText(this, "Số điện thoại không được để trống!", Toast.LENGTH_SHORT).show();
            return;
        }
        if (TextUtils.isEmpty(userPass)){
            Toast.makeText(this, "Mật khẩu không được để trống!", Toast.LENGTH_SHORT).show();
            return;
        }
        if (TextUtils.isEmpty(userAddress)){
            Toast.makeText(this, "Địa chỉ không được để trống!", Toast.LENGTH_SHORT).show();
            return;
        }
        if (userPass.length()<6){
            Toast.makeText(this, "Mật khẩu quá yếu!", Toast.LENGTH_SHORT).show();
            return;
        }
        if (userPhone.length()!=10){
            Toast.makeText(this, "Số điện thoại không đúng!", Toast.LENGTH_SHORT).show();
            return;
        }

        DataClient dataClient = APIUtils.getData();
        Call<String> call = dataClient.checkaccount(userPhone);
        call.enqueue(new Callback<String>() {
            @Override
            public void onResponse(Call<String> call, Response<String> response) {
                if (response.body().equals("1")){
                    Toast.makeText(RegistrationActivity.this, "Tài khoản đã tồn tại!", Toast.LENGTH_SHORT).show();
                }else {
                    /////Create User
                    reg.setVisibility(View.GONE);
                    progressBar.setVisibility(View.VISIBLE);
                    PhoneAuthProvider.getInstance().verifyPhoneNumber(
                            "+84" + userPhone, 60, TimeUnit.SECONDS, RegistrationActivity.this,
                            new PhoneAuthProvider.OnVerificationStateChangedCallbacks() {
                                @Override
                                public void onVerificationCompleted(PhoneAuthCredential phoneAuthCredential) {
                                    reg.setVisibility(View.VISIBLE);
                                    progressBar.setVisibility(View.GONE);
                                }

                                @Override
                                public void onVerificationFailed(FirebaseException e) {
                                    reg.setVisibility(View.VISIBLE);
                                    progressBar.setVisibility(View.GONE);
                                    Toast.makeText(RegistrationActivity.this, "VerificationFailed", Toast.LENGTH_SHORT).show();
                                }

                                @Override
                                public void onCodeSent(final String verificationId, PhoneAuthProvider.ForceResendingToken forceResendingToken) {
                                    reg.setVisibility(View.VISIBLE);
                                    progressBar.setVisibility(View.GONE);
                                    Intent intent = new Intent(RegistrationActivity.this,VerificationActivity.class);
                                    intent.putExtra("Name",userName);
                                    intent.putExtra("Phone",userPhone);
                                    intent.putExtra("Pass",userPass);
                                    intent.putExtra("Address",userAddress);
                                    intent.putExtra("VerificationId",verificationId);
                                    startActivity(intent);
                                    finish();
                                }
                            }
                    );
                }
            }

            @Override
            public void onFailure(Call<String> call, Throwable t) {

            }
        });
    }
}