#Assignment #2 - FAQ
COMP4711 - BCIT - Fall 2017

##What do we do with WACKY data?

The WACKY server provides a list of valid airplanes, airports and airlines, with unique codes for each. You don't need to know about the other airlines at the moment, but you can use the first two in your data. Actually, you must use that data as part of your fleet and flights collections, for consistency between airlines.

You don't need to save all the WACKY data - for instance, you could just store an airplane code and look up its name, price, etc, from the WACKY data retrieved.

Your fleet model might hold a number of Flyingcontracption objects (the entitity class), each of which has an id and an airplaneCode property. There is nothing wrong with having more than one of a given kind of plane in your fleet - they will have different ids assigned by you. Similarly, your flights might be a collection of Flightsegment objects, each of which had an id, origin airport code, destination aitport code, departure time, and arrival time.

You don't need to unit test airplane or airport properties - they come from WACKY.

You do need to ensure that your fleet of planes is valid, i.e. all legitimate types and with a total capital outlay under $10million.

You do need to ensure that your collection of flight segments is valid, i.e. between legitimate airports, and only those that your airline is allowed to fly to/from; all planes "home" overnight, etc.

