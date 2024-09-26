import java.util.Scanner;

public class prak103 {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);

        int N = input.nextInt();
        int start = input.nextInt();
        int count = 0;
        do {
            if (start % 2 != 0) {
                System.out.print(start + " ");
                count++;
            }
            start++;
        } while (count < N); 
        input.close();
    }
}