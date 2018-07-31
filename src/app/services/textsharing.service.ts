import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { Observable } from '../../../node_modules/rxjs';

const httpOptions = {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable({
    providedIn: 'root'
})
export class TextsharingService {

    private registerURL = 'http://localhost/textsharing/textsharing-php/register.php';
    private pasteURL = 'http://localhost/textsharing/textsharing-php/paste.php';
    private detailURL = 'http://localhost/textsharing/textsharing-php/detail.php';
    private updateURL = 'http://localhost/textsharing/textsharing-php/update.php';

    constructor( private http: HttpClient ) { }

    addGuest (registerData): Observable<any> {
        return this.http.post(this.registerURL, registerData);
    }

    addPaste (pasteData): Observable<any> {
        return this.http.post(this.pasteURL, pasteData);
    }

    getDetail (id): Observable<any> {
        return this.http.get(this.detailURL + '?id=' + id);
    }

    updatePaste (id, language, content): Observable<any> {
        let updateFormData: {} = {
            "id" : id,
            "language" : language,
            "content"  : content
        } ;
        console.log(updateFormData);
        return this.http.post(this.updateURL, updateFormData);
    }

}