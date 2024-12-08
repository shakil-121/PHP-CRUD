let a = 0, b = 1, c;  // Initialize variables
document.write("Fibonacci Series:<br/>");  // Output the heading

// Output the first two numbers of the Fibonacci series
document.write(a + "<br/>");
document.write(b + "<br/>");

for (var i = 2; i < 10; i++) {  // Loop to display the next 8 numbers (total 10 terms)
    c = a + b;  // Calculate the next number
    document.write(c + "<br/>");  // Write the Fibonacci number
    
    a = b;  // Shift `a` to the next number
    b = c;  // Shift `b` to the next number
}