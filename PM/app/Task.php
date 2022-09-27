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
        
       
