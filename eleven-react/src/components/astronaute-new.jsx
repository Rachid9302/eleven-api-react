import React, { Component } from 'react';
import axios from 'axios';


class AstronauteNew extends Component{
    state = {
        nom: '',
        prenom: '',
        age: 0
    };

    handleChange = event => {
        this.setState({
            nom: event.target.value.nom,
            prenom: event.target.value.prenom,
            age: event.target.value.age
        });
    };

    handleSubmit = event => {
        event.preventDefault();
        const astronaute = {
            nom: this.state.nom,
            prenom: this.state.prenom,
            age: this.state.age
        };

        axios.post('http://localhost/eleven-api-react/eleven-api/web/app_dev.php/new-astronaute', {astronaute})
            .then(res =>{
                console.log(res);
                console.log(res.data);
            })
    };

    render(){
        return (
            <div>
                <h1>Ajouter un nouvel astronaute</h1>
                <form onSubmit={this.handleSubmit}>
                    <div class="form-group">
                        <label class="control-label">Nom</label>
                        <input type="text" name="nom" class="form-control" onChange={this.handleChange}/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Prenom</label>
                        <input type="text" name="prenom" class="form-control" onChange={this.handleChange}/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Age</label>
                        <input type="number" name="age" class="form-control" onChange={this.handleChange}/>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Ajouter</button>
                </form>
            </div>
        )
    }
}

export default AstronauteNew;