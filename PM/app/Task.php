  @PostMapping("/flight/post")
    public Flight postFlight(@RequestBody Flight flight) {
        return flightRepository.save(flight);
    }
    
    @GetMapping("/flight/get/{source}/{destination}/{date}")
    public List<Flight> getFilteredFlights(@PathVariable("source") String source,
                                    @PathVariable("destination") String destination,
                                    @PathVariable("date") String date) {
        LocalDate departureDate = LocalDate.parse(date);
        
        System.out.println(source+" "+destination+" "+departureDate);
        
        return flightRepository.findFilteredFlights(source,destination,departureDate);
        
    }
    @GetMapping("/flight/one/{id}")
    public Flight getFlightById(@PathVariable("id") Long id) {
        Optional<Flight> optional = flightRepository.findById(id);
        
        if(!optional.isPresent())
            throw new RuntimeException("Invalid ID");
        Flight f = optional.get();
        System.out.println(f);
        return f;
    }
        
        ////////////////////////////////////////////////////////////////////////////////
        
        @Query("select f from Flight f where f.source = ?1 and f.destination = ?2 and f.depatureDate = ?3")
/////////////////////////////////////////////////////////////////////////////////////////
      flight model
      export class Flight{

    id?:number;
    name:string;
    source:string;
    destination:string;
    depatureDate:string;
    depatureTime:string;
    arrivalDate:string;
    arrivalTime:string;
    duration:number;
    adultFare:number;
    childFare:number;
    seats:number;
}
      ////////////////////////////////////////////////////////////////////////////////////
      
      import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { Flight } from 'src/app/model/flight.model';
import { FlightServiceService } from 'src/app/service/flight-service.service';

@Component({
  selector: 'app-book-flight',
  templateUrl: './book-flight.component.html',
  styleUrls: ['./book-flight.component.css']
})
export class BookFlightComponent implements OnInit {
  source:string;
  destination:string;
  departureDate:string;
  flightArr:Flight[];

  constructor(private flighService: FlightServiceService,private router:Router) { }

  ngOnInit(): void {
  }

  searchSubmit(searchFlight: NgForm){
    this.source = searchFlight.value.source;
    this.destination = searchFlight.value.destination;
    this.departureDate = searchFlight.value.departureDate;
    console.log(searchFlight.value.source+" "+searchFlight.value.destination+" "+searchFlight.value.departureDate); 
    this.flighService.filteredFlight(this.source,this.destination,this.departureDate).subscribe(data=>{
      this.flightArr = data;
    });
  }
  selectFlight(id: number){
    console.log(id);
    localStorage.setItem('id',String(id));
    this.router.navigateByUrl('/booking-confirmation');
  }
}
      ///////////////////////////////////////////////////////////////////////////////////////
      
      import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { Flight } from 'src/app/model/flight.model';
import { FlightServiceService } from 'src/app/service/flight-service.service';

@Component({
  selector: 'app-book-flight',
  templateUrl: './book-flight.component.html',
  styleUrls: ['./book-flight.component.css']
})
export class BookFlightComponent implements OnInit {
  source:string;
  destination:string;
  departureDate:string;
  flightArr:Flight[];

  constructor(private flighService: FlightServiceService,private router:Router) { }

  ngOnInit(): void {
  }

  searchSubmit(searchFlight: NgForm){
    this.source = searchFlight.value.source;
    this.destination = searchFlight.value.destination;
    this.departureDate = searchFlight.value.departureDate;
    console.log(searchFlight.value.source+" "+searchFlight.value.destination+" "+searchFlight.value.departureDate); 
    this.flighService.filteredFlight(this.source,this.destination,this.departureDate).subscribe(data=>{
      this.flightArr = data;
    });
  }
  selectFlight(id: number){
    console.log(id);
    localStorage.setItem('id',String(id));
    this.router.navigateByUrl('/booking-confirmation');
  }
}
      
////////////////////////////////////////////////////////////////////////////////////////////
      
      import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Flight } from '../model/flight.model';

@Injectable({
  providedIn: 'root'
})
export class FlightServiceService {

  constructor(private http: HttpClient) { }

  postFlight(flight: Flight):Observable<any> {
    return this.http.post<any>("http://localhost:8714/flight/post",flight);
  }

  filteredFlight(source: string, destination: string, departureDate: string):Observable<Flight[]> {
    return this.http.get<Flight[]>("http://localhost:8714/flight/get/"+source+"/"+destination+"/"+departureDate+"");
  }

  getFlightDetailsById(id: string):Observable<Flight> {
    return this.http.get<Flight>("http://localhost:8714/flight/one/"+id);
  }

}
      
      /////////////////////////////////////////////////////////////////
      <div class="form">
    <form #searchFlight="ngForm" (submit)="searchSubmit(searchFlight)">
      <label>Source: </label>
      <input type="text" name="source" ngModel #source="ngModel">&nbsp;&nbsp;

      <label>Destination : </label>
      <input type="text" name="destination" ngModel #destination="ngModel">&nbsp;&nbsp;

      <label>Departure Date : </label>
      <input type="date" name="departureDate" ngModel #departureDate="ngModel">&nbsp;&nbsp;

      <input type="submit" value="search">
    </form>
</div>

<div class="title_box">
    <label>AIRLINES</label>&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;

    <label>DEPARTURE</label>&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;

    <label>DURATION</label>&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;

    <label>ARRIVAL</label>&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;

    <label>FARE/PERSON</label>
</div>

<div >
    <ul *ngFor="let f of flightArr">
        <li class="flightlist">
            {{f.name}}
            &nbsp;&nbsp;&nbsp;&nbsp;
            {{f.source}}/{{f.depatureDate}}
            &nbsp;&nbsp;&nbsp;&nbsp;
            {{f.duration}}
            &nbsp;&nbsp;&nbsp;&nbsp;
            {{f.destination}}/{{f.arrivalDate}}
            &nbsp;&nbsp;&nbsp;&nbsp;
            {{f.adultFare}}
            &nbsp;&nbsp;&nbsp;
            <button class= "button1" (click)="selectFlight(f.id)">Select</button>
        </li>
    </ul>
</div>
