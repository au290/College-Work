package soal_1_5;

public class Rectangle extends Shape {
	private double length;
	private double width;

	// ----------------------------------
	// Constructor: Sets up the Rectangle.
	// ----------------------------------
	public Rectangle(double l, double w) {
		super("Rectangle");
		length = l;
		width = w;
	}

	// -----------------------------------------
	// Returns the surface area of the Rectangle.
	// -----------------------------------------
	public double area() {
		return length * width;
	}

	// -----------------------------------
	// Returns the sphere as a String.
	// -----------------------------------
	public String toString() {
		return super.toString() + " of length " + length + " and width " + width;
	}
}