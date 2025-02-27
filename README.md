# Northwest-Corner-Method
Northwest Corner Method

Project Description: Northwest Corner Method Application
Developed by Roberto Alemán, ventics.com  

This project is an interactive PHP application designed to solve transportation problems using the Northwest Corner Method. It specifically addresses scenarios involving 4 plants and 4 warehouses, each with their respective supply and demand requirements.

Project Components:

User Interface (HTML, CSS, JavaScript):
Allows users to input the necessary data:
Production capacity of each plant (supply).
Requirements of each warehouse (demand).
Transportation costs associated with each plant-warehouse pair.
Presents the results in a clear and organized manner:
Solution table, showing the quantity of units assigned from each plant to each warehouse.
Distribution cost table, detailing the variable activity, cost per unit, and total distribution cost.
Total distribution cost.
Utilizes AJAX to send data to the server and receive responses without page reloads.
Server-Side Logic (PHP):
Receives data input by the user.
Implements the Northwest Corner Method algorithm to calculate the optimal solution.
Calculates the distribution costs associated with each assignment.
Generates HTML code to display the results in the user interface.
Key Features:

Dynamic Data Input: Users can modify capacity, requirement, and cost values as needed.
Step-by-Step Calculation: The program displays the unit allocation process, making the method easy to understand.
Clear Results Visualization: Tables and total cost provide a comprehensive view of the solution.
Distribution Cost Calculation: Costs associated with each allocation are detailed, and the total cost is calculated.
Objective:

The primary objective of this project is to provide an interactive and educational tool that enables users to understand and apply the Northwest Corner Method to solve transportation problems. Additionally, by allowing dynamic data input, it facilitates experimentation with different scenarios and the generation of customized solutions.

Basic Concepts about Northwest Corner Method

Transportation Problem: Involves determining the optimal quantity of goods to ship from various origins (factories, warehouses) to various destinations (customers, distribution centers) to minimize total transportation costs.
Northwest Corner: Refers to the upper-left cell in a transportation table that represents the origins and destinations.

Method Steps

Build the Transportation Table: Organize the data into a table where the rows represent the origins, the columns represent the destinations, and the cells contain the unit transportation costs.

Assign the Maximum Possible Quantity: Start in the northwest corner cell and assign the largest possible quantity of units, taking into account the supply constraints of the origin and the demand of the destination.

Adjust Supply and Demand: Subtract the assigned quantity from the origin's supply and the destination's demand. If the supply is exhausted, eliminate the corresponding row. If the demand is met, eliminate the corresponding column.

Move to the Next Cell: If the row was eliminated, move to the next cell down in the same column. If the column was eliminated, move to the next cell to the right in the same row. If both the row and column were eliminated, move to the next cell diagonally.

Repeat the Process: Continue assigning quantities and adjusting supply and demand until all constraints are satisfied.

Considerations

The northwest corner method is easy to apply, but it does not guarantee the optimal solution.
Its main objective is to obtain an initial feasible solution that can be improved with other methods, such as the Stepping Stone method or the MODI method.

In summary

The northwest corner method is a useful tool to start solving transportation problems, providing a basis for finding more efficient solutions.
