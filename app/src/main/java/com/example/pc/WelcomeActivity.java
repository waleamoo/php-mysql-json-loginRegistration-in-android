package com.example.pc;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import com.example.pc.phpandroidlogin.MainActivity;
import com.example.pc.phpandroidlogin.R;

public class WelcomeActivity extends AppCompatActivity {
    private Button bt_logout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_welcome);

        bt_logout = (Button)findViewById(R.id.bt_logout);

    }

    public void userLogout(View v){
        startActivity(new Intent(getApplicationContext(), MainActivity.class));
    }
}
