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
      
      /////////////////////////////////booking confirmation.html///////////////////////
      <div class="invoice">
    <h3>BookMyFlight</h3>
    <label>AirLines :</label>{{flight.name}}<br />

    <label class="from">From</label><br />
    {{flight.source}}

    <label class="to">To</label><br />
    {{flight.destination}}<br />

    <label>Fare/Adult :</label>{{flight.adultFare}}&nbsp;&nbsp;<label>Fare/Child :</label>{{flight.childFare}}<br />
    <form #fareForm="ngForm" (change)="change(fareForm)">
        <label>No.of.Adults :</label>
        <input type="number" name="no_of_adult" ngModel #no_of_adult="ngModel"><br />
        <label>No.of.Children :</label>
        <input type="number" name="no_of_children" ngModel #no_of_children="ngModel"><br />
        <label>Total Fare : {{sum}}</label>
    </form> 
</div>
      
      ////////////////////////////////////////booking-confirmation component.ts///////////////////////////
      
      import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Flight } from 'src/app/model/flight.model';
import { FlightServiceService } from 'src/app/service/flight-service.service';

@Component({
  selector: 'app-booking-confirmation',
  templateUrl: './booking-confirmation.component.html',
  styleUrls: ['./booking-confirmation.component.css']
})
export class BookingConfirmationComponent implements OnInit {
  id:string;
  flightArr:Flight[];
  flight:Flight;
  name:string;
  sum:number = 0;
  constructor(private flightService:FlightServiceService) { }

  ngOnInit(): void {
    this.id = localStorage.getItem('id');

    this.flightService.getFlightDetailsById(this.id).subscribe(data=>{
    this.flight = data;
    });
  }

  change(fareForm: NgForm){
    this.sum = (fareForm.value.no_of_adult*this.flight.adultFare) + 
                (fareForm.value.no_of_children*this.flight.childFare);
  }

}
      
      //////////////////////////////post-flight-html//////////////////
      
      <div class="form">
    <form #flightForm="ngForm" (submit)="onFlighttSubmit(flightForm)">
      <h2>Vendors Flight Form</h2>
      <label>Name: </label>
      <input type="text" name="name" ngModel #name="ngModel"><br /><br />

      <label>Source: </label>
      <input type="text" name="source" ngModel #source="ngModel"> &nbsp;

      <label>Destination: </label>
      <input type="text" name="destination" ngModel #destination="ngModel"><br /><br />

      <label>Departure Date: </label>
      <input type="date" name="depatureDate" ngModel #depatureDate="ngModel"> &nbsp;

      <label>Departure Time:</label>
      <input type="time" name="depatureTime" ngModel #depatureTime="ngModel"><br /><br />

      <label>Arrival Date: </label>
      <input type="date" name="arrivalDate" ngModel #arrivalDate="ngModel">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <label>Arrival Time:</label>
      <input type="time" name="arrivalTime" ngModel #arrivalTime="ngModel"><br /><br />   

      <label>Adult Fare:</label>
      <input type="number" name="adultFare" ngModel #adultFare="ngModel"> &nbsp;

      <label>Child Fare:</label>
      <input type="number" name="childFare" ngModel #childFare="ngModel"><br /><br />

      <label>Duration:</label>
      <input type="number" name="duration" ngModel #duration="ngModel">&nbsp;&nbsp; 

      <label>Seats:</label>
      <input type="number" name="seats" ngModel #seats="ngModel"><br /><br />
  
      <input type="submit" value="Post Flight">
    </form>
  </div>
  
      ///////////////////////////////post-flight.ts
      
      import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { Flight } from 'src/app/model/flight.model';
import { FlightServiceService } from 'src/app/service/flight-service.service';

@Component({
  selector: 'app-post-flight',
  templateUrl: './post-flight.component.html',
  styleUrls: ['./post-flight.component.css']
})
export class PostFlightComponent implements OnInit {

  constructor(private flightService: FlightServiceService,private router:Router) { }

  ngOnInit(): void {
  }

  onFlighttSubmit(flightForm: NgForm){
    let flight : Flight={
      name:flightForm.value.name,
      source:flightForm.value.source,
      destination:flightForm.value.destination,
      depatureDate:flightForm.value.depatureDate,
      depatureTime:flightForm.value.depatureTime,
      arrivalDate:flightForm.value.arrivalDate,
      arrivalTime:flightForm.value.arrivalTime,
      duration:flightForm.value.duration,
      adultFare:flightForm.value.adultFare,
      childFare:flightForm.value.childFare,
      seats:flightForm.value.seats,
    };

    this.flightService.postFlight(flight).subscribe();
    this.router.navigateByUrl('/post-successful');
  }

}
      ////////////////////////////
      
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
      
      @GetMapping("/flight/details")
    public List<Flight> getFlightsByDetails(@RequestParam("source") String source,@RequestParam("destination") String destination,@RequestParam("date") String date){
        
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyy-MM-dd");  
        
        LocalDate temp = LocalDate.parse(date, formatter);
        
        return flightRepository.findByDetails(source, destination, temp);
    }

      constructor(private http:HttpClient) { }

  searchFlights(search:Search): Observable<Flight[]>{
    let queryParams = new HttpParams();
    queryParams = queryParams.append("source",search.source);
    queryParams = queryParams.append("destination",search.destination);
    queryParams = queryParams.append("date",search.date);

    return this.http.get<Flight[]>("http://localhost:5671/flight/details",{params:queryParams});
  }

      
      <h1>Bookings</h1>
<div id="extra_box">
    <div class="booking_box" *ngFor="let b of bookingArr">
        <div class="box-style-5">
        <div class="flight_box">
            Source : {{b.flight.source}} <br>
            Destination : {{b.flight.destination}} <br>
            Departure Date : {{b.flight.departureDate}} <br>
            Departure Time : {{b.flight.departureTime}} <br>
            Arrival Date : {{b.flight.arrivalDate}} <br>
            Arrival Time : {{b.flight.arrivalTime}} <br>
            Fare / Adult : {{b.flight.adultFare}} <br>
            Fare / Child : {{b.flight.childFare}} <br>
        </div>
        Total Adults : {{b.adult}} <br>
        Total Childs : {{b.child}} <br>
        Total Price : Rs{{b.price}} <br>
    </div>
</div>
</div>
