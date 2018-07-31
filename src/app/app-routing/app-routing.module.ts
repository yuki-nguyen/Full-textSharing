import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';

import {HomeComponent} from "../components/home/home.component";
import {LoginComponent} from "../components/login/login.component";
import {RegisterComponent} from "../components/register/register.component";
import {DetailComponent} from "../components/detail/detail.component";


@NgModule({
    exports: [ RouterModule ]
})
export class AppRoutingModule {}
