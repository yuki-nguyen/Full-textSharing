import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule }    from '@angular/common/http';
// import { HighlightDirective } from 'ng-highlight';
import { HighlightModule } from 'ngx-highlightjs';
import { MarkdownModule } from 'ngx-markdown';
import { RouterModule, Routes } from '@angular/router';
// import { HashLocationStrategy, LocationStrategy } from '@angular/common';
import { AppComponent } from './app.component';
import {HomeComponent} from "./components/home/home.component";
import {LoginComponent} from "./components/login/login.component";
import {RegisterComponent} from "./components/register/register.component";
import {DetailComponent} from "./components/detail/detail.component";
import {HeaderComponent} from "./components/header/header.component";
import {FooterComponent} from "./components/footer/footer.component";
import {WelcomeComponent} from "./components/welcome/welcome.component";
import {EditComponent} from "./components/edit/edit.component";
import {AppRoutingModule} from "./app-routing/app-routing.module";

const appRoutes: Routes = [
    { path:'', redirectTo: './', pathMatch: 'full' },
    { path: './', component: HomeComponent },
    { path: 'login', component: LoginComponent },
    { path: 'register', component: RegisterComponent },
    { path: 'detail/:id', component: DetailComponent }
];
@NgModule({
    declarations: [
        AppComponent,
        HeaderComponent,
        FooterComponent,
        HomeComponent,
        DetailComponent,
        LoginComponent,
        RegisterComponent,
        WelcomeComponent,
        EditComponent,
        // HighlightDirective
    ],
    imports: [
        RouterModule.forRoot(
            appRoutes,
            { enableTracing: true, useHash: false } // <-- debugging purposes only
        ),
        BrowserModule,
        AppRoutingModule,
        HttpClientModule,
        HighlightModule.forRoot( {theme : 'agate'} ),
        MarkdownModule.forRoot()
    ],
    // providers: [{provide: LocationStrategy, useClass: HashLocationStrategy}],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule { }